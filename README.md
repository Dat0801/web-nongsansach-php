# Website Nông Sản Sạch

## Tóm Tắt Dự Án

Dự án này là một website dành riêng để bán các sản phẩm nông sản sạch và hữu cơ, bao gồm rau củ, trái cây. Mục tiêu của website là cung cấp cho khách hàng khả năng tiếp cận dễ dàng với những sản phẩm chất lượng cao, an toàn và thân thiện với môi trường trực tiếp từ các trang trại đáng tin cậy.

## Tính Năng Trang Người Dùng
- **Đăng ký tài khoản**: Đăng ký tài khoản thông qua email để xác nhận và tạo tài khoản.
- **Danh Mục Sản Phẩm**: Tổ chức theo danh mục rau củ, trái cây.
- **Danh Sách Sản Phẩm**: Cung cấp thông tin chi tiết về từng sản phẩm, bao gồm giá cả, số lượng tồn, trọng lượng, ...
- **Tìm Kiếm & Lọc**: Chức năng tìm kiếm mạnh mẽ và bộ lọc giúp khách hàng tìm kiếm sản phẩm nhanh chóng.
- **Giỏ Hàng & Thanh Toán**: Trải nghiệm mua sắm mượt mà và an toàn với quy trình thanh toán đơn giản.
- **Theo Dõi Đơn Hàng**: Khách hàng có thể theo dõi đơn hàng từ lúc mua đến khi giao hàng.
- **Thiết Kế Responsive**: Tối ưu cho thiết bị di động để đảm bảo trải nghiệm liền mạch trên mọi thiết bị.

## Tính Năng Trang Quản Trị

- **Quản Lý Sản Phẩm**: Thêm, sửa, xóa sản phẩm, bao gồm thông tin chi tiết như tên, giá, hình ảnh và mô tả.
- **Quản Lý Danh Mục**: Tạo và chỉnh sửa danh mục sản phẩm để tổ chức hàng hóa một cách hợp lý.
- **Quản Lý Đơn Hàng**: Xem và cập nhật trạng thái đơn hàng.
- **Quản Lý Khách Hàng**: Theo dõi thông tin khách hàng, bao gồm danh sách khách hàng, lịch sử mua hàng.

## Công Nghệ Sử Dụng

- **Ngôn Ngữ**: PHP
- **Cơ Sở Dữ Liệu**: MySQL
- **Tạo giao diện người dùng**: HTML/CSS, Boostrap
- **Tương tác người dùng**: JavaScript, jQuery

## Cài Đặt

1. **Clone kho lưu trữ**:
    ```bash
    git clone https://github.com/Dat0801/web-nongsansach-php.git
    ```
2. **Chuyển đến thư mục dự án**:
    ```bash
    cd web-nongsansach-php
    ```
3. **Tạo cơ sở dữ liệu**: Sử dụng file `ql_nongsan.sql` để tạo cơ sở dữ liệu cho dự án.
4. **Cấu hình tệp kết nối**: Chỉnh sửa tệp `config.php` để thiết lập kết nối cơ sở dữ liệu.
5. **Chạy website**: Đưa toàn bộ tệp vào thư mục gốc của máy chủ web (ví dụ: `htdocs` cho XAMPP) và truy cập vào địa chỉ `http://localhost/web-nongsansach-php`.

## Tài Khoản Test

### Chức Năng Thanh Toán qua VNPay

- **Tài Khoản Test**:
  - **Ngân hàng**: NCB
  - **Số thẻ**: 9704198526191432198
  - **Tên chủ thẻ**: NGUYEN VAN A
  - **Ngày phát hành**: 07/15
  - **Mật khẩu OTP**: 123456


### Tài Khoản Quản Trị

- **Tài Khoản**:
  - **Tài khoản**: admin
  - **Mật khẩu**: Admin123*

## Sử Dụng

- **Giao Diện Quản Trị**: Đăng nhập với tài khoản quản trị để quản lý sản phẩm, danh mục, đơn hàng và khách hàng.
- **Giao Diện Người Dùng**: Duyệt sản phẩm, thêm vào giỏ hàng và thực hiện thanh toán điền thông tin giao hàng.
