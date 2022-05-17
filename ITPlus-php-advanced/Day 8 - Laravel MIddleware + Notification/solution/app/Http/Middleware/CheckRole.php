<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //Truyền tham số thứ 3 làm parameters
    public function handle(Request $request, Closure $next)
    {
        //Do auth::user sẽ chọc thẳng vào model User, nên khi ->role
        //sẽ lấy trực tiếp role ra
        $authRoleId = Auth::user()->role_id;
        //thay 'admin' = $roleName
        if ($authRoleId != Role::ADMIN) {
            //Nếu role không phải là admin thì hiển thị trang 403
            //mặc định của Laravel
            abort(403);
        }
        return $next($request);
    }
}
