<?php 

$maSP = "EV2009";
$tenSP = "Tấm hợp kim nhôm ngoài trời EV2009";
$soLuong = 500;
$donGia = 160000;
define("VAT", 0.05);

echo "
MaSP: $maSP 
TenSP: $tenSP
Soluong: $soLuong
DonGia: $donGia
VAT: ".VAT;

echo sprintf("Truoc khi tru VAT: %d", $soLuong * $donGia);
echo sprintf("Sau khi tru VAT: %d", $soLuong * $donGia * VAT);
