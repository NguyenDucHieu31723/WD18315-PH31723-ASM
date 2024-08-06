<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .content {
            font-size: 16px;
            line-height: 1.5;
        }

        .content p {
            margin: 0 0 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        .footer {
            font-size: 14px;
            color: #999;
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <p>Xin chào {{ $customer->name }},</p>
            <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
            <p>Để đặt lại mật khẩu, vui lòng nhấp vào nút bên dưới:</p>
            <div class="btn">
                <a href="{{ route('auth.showFormUpdate', $token) }}" class="button">Đặt lại mật khẩu</a>
            </div>
            <p>Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.</p>
        </div>
        <div class="footer">
            <p>Trân trọng,</p>
            <p>Đội ngũ hỗ trợ</p>
        </div>
    </div>
</body>

</html>
