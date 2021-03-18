<html>

<!-- <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php //echo $this->baseUrl('Skin/Admin/JS/jquery-3.5.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php //echo $this->baseUrl('Skin/Admin/JS/mage.js');?>"></script>
    <script src="./JS/script.js"></script>
</head>  -->

<body>
    <table width="100%">
        <tr>
            <td colspan="3"><?php echo $this->getChild('header')->toHtml(); ?></td>
        </tr>
        <tr>
            <td><?php echo $this->getChild('left')->toHtml(); ?></td>
            <td><?php echo $this->getChild('content')->toHtml(); ?></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3"><?php echo $this->getChild('footer')->toHtml(); ?></td>
        </tr>

    </table>
</body>

</html>