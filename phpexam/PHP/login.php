<html>

<head>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <div class="main-section">
        <form method="POST" action="loginRedirect.php">
            <table>
                <tr>
                    <td class="align-center">Login</td>
                </tr>
                <tr>
                    <td class="full-width">Email</td>
                </tr>
                <tr>
                    <td><input class="full-width" type="email" name="email" id="email">

                    </td>
                </tr>
                <tr>
                    <td class="full-width">Password</td>
                </tr>
                <tr>
                    <td><input class="full-width" type="password" name="password" id="password">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="login" id="login" value="LOGIN">
                        <input type="button" name="register" id="register" value="REGISTER">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>