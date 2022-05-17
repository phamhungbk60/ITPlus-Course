<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserInformationController extends Controller
{
    /**
     * Xem chi tiết thông tin user information
     *
     * @return void
     */
    public function show()
    {
        $userInformation = Auth::user()->userInformation;
        return view('user-information.show', [
            //nếu $userInformation khác null thì trả về $userInformation,
            //còn nếu = null thì trả về phần bên phải
            'userInformation' => $userInformation ?? new UserInformation()
        ]);
    }

    /**
     * Update thông tin người dùng
     *
     * @return void
     */
    public function update(Request $request)
    {
        $userInformation = UserInformation::where(['user_id' => Auth::user()->id])->first();
        //lấy file upload lên từ server, bỏ qua bước validation
        $avatar = $request->file('avatar');
        //lưu tên file: bao gồm timestamp hiện tại dứoi dạng string to time, hash thông tin file,
        //mã hoá md5 để tránh trùng file, kết hợp tên file gốc để ra tên file hoàn chỉnh
        $avatarFileName = pathinfo($avatar->getClientOriginalName(), PATHINFO_FILENAME);
        $avatarFileExtension = pathinfo($avatar->getClientOriginalName(), PATHINFO_EXTENSION);

        $encryptedFileName = md5(Carbon::parse(Carbon::now()) . 'user-' . Auth::user()->id . '-' . $avatarFileName);

        //tiến hành gộp array input của 3 trường address, phone và dob
        //kết hợp với avatar_path, avatar_name và id người dùng đăng nhập hiện tại
        $requestData = array_merge($request->input(), [
            'avatar_path' => 'avatars' . DIRECTORY_SEPARATOR . Auth::user()->id,
            'avatar_name' => $encryptedFileName . '.' . $avatarFileExtension,
            'user_id' => Auth::user()->id
        ]);

        //nếu người dùng chưa tạo thì thêm mới UserInformation
        if ($userInformation == null) {
            UserInformation::create($requestData);
        }
        //nếu đã có thì tiến hành update thông tin người dùng.
        else {
            $userInformation->update($requestData);
        }

        //lưu file vật lý với tên $encryptedFileName với disk avatar
        $avatar->storeAs(Auth::user()->id, $encryptedFileName . '.' . $avatarFileExtension, 'avatar');

        return redirect('user-profile');
    }
}
