// JavaScript Document
function login() {
	var username = document.forms["form1"]["txtUsername"].value;
	var password = document.forms["form1"]["txtPassword"].value;
	if(username == "vdduy" && password == "passne") {
		alert("Bạn đăng nhập thành công!");
	}
	else {
		alert("Bạn đăng nhập thất bại!");
	}
}

function feedback(name){
	alert("Cảm ơn bạn đã gửi góp ý cho Salomon.vn, " + name);
}

function search(){
	var giaTu = parseInt(document.forms["form1"]["slGiaTu"].value);
	switch(giaTu){
		case 1000:
			alert("Bạn tìm mua điện thoại rẻ vậy!");
			break;
		case 3000:
			alert("Bạn tìm điện thoại giá trung bình!");
			break;
		case 8000:
			alert("Bạn là đại gia!");
			break;
		default:
			alert("Bạn không chọn giá!");
	}
}

function checkout(){
	var chuoi = "";
	for(var i=1; i<=4; i++){
		var soluong = parseInt(document.forms["form1"]["txtSoLuong" + i].value);
		chuoi += "San pham thu " + i + " co so luong: " + soluong + "\n";
	}
	alert(chuoi);
}
function checkout2(){
	var chuoi = "";
	var i = 1;
	do {
		var soluong = parseInt(document.forms["form1"]["txtSoLuong" + i].value);
		chuoi += "San pham thu " + i + " co so luong: " + soluong + "\n";
		i++;
	}
	while(i<=4)
	
	alert(chuoi);
}
function checkout3(){
	var chuoi = "";
	var i = 1;
	while(i<=4){
		var soluong = parseInt(document.forms["form1"]["txtSoLuong" + i].value);
		chuoi += "San pham thu " + i + " co so luong: " + soluong + "\n";
		i++;
	}
	alert(chuoi);
}

//Kiểm tra góp ý
function checkFeedback(){
	//Lấy dữ liệu các trường cần kiểm tra
	var ten = document.getElementById("txtTen").value;
	var diachi = document.getElementById("txtDiaChi").value;
	var dienthoai = document.getElementById("txtDienThoai").value;
	var email = document.getElementById("txtEmail").value;
	var noidung = document.getElementById("txtNoiDung").value;
	
	//Khai báo biến lưu lỗi
	var loi = "";
	//Kiểm tra dữ liệu để thu thập lỗi
	if(ten==null || ten==""){
		loi = loi + "Vui lòng nhập tên!\n";
	}
	if(diachi==null || diachi==""){
		loi = loi + "Vui lòng nhập địa chỉ!\n";
	}
	if(dienthoai==null || dienthoai==""){
		loi = loi + "Vui lòng nhập điện thoại!\n";
	}
	if(email==null || email==""){
		loi = loi + "Vui lòng nhập email!\n";
	}
	else if (!isEmail(email))
	{
		loi = loi + "Địa chỉ email không hợp lệ!\n";
	}
	if(noidung==null || noidung==""){
		loi = loi + "Vui lòng nhập nội dung!\n";
	}
	//Nếu có lỗi xảy ra
	if(loi != ""){
		alert(loi);
		return false;
	}
	//Ngược lại nếu không có lỗi
	else {
		alert("Tất cả dữ liệu hợp lệ!")
		return true;
	}
}

//Hàm kiểm tra địa chỉ email
function isEmail (email){
	var hople = false; 
	var bieuthuc = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(bieuthuc.test(email)){
		hople = true;
	}
	else {
		hople = false;
	}
	return hople;
}

//Hàm xác nhận xóa dữ liệu
function confirmDelete(){
    if(confirm('Bạn có chắc chắn muốn xóa?')){
        return true;
    }
    else{
        return false;
    }
}