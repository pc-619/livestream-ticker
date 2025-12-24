<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
        overflow-x:hidden;
        }

        .scroll-left{
            width: 300px;
        }

        .scroll-left > *{
        height:auto;
        width:100%;
        }

        .scroll-left h1 {
        height:auto;
        margin: auto;
        text-align: right;
        
        /* Apply animation to this element */
        -moz-animation: scroll-left 3s linear infinite;
        -webkit-animation: scroll-left 3s linear infinite;
        animation: scroll-left 3s linear infinite;
        }


        /* Move it (define the animation) */

        @-moz-keyframes scroll-left {
        0% {
            -moz-transform: translateX(100%);
        }
        100% {
            -moz-transform: translateX(0%);
        }
        }

        @-webkit-keyframes scroll-left {
        0% {
            -webkit-transform: translateX(100%);
        }
        100% {
            -webkit-transform: translateX(0%);
        }
        }

        @keyframes scroll-left {
        0% {
            -moz-transform: translateX(100%);
            /* Browser bug fix */
            -webkit-transform: translateX(100%);
            /* Browser bug fix */
            transform: translateX(100%);
        }
        100% {
            -moz-transform: translateX(0%);
            /* Browser bug fix */
            -webkit-transform: translateX(0%);
            /* Browser bug fix */
            transform: translateX(-10%);
        }
        }

    </style>
</head>
<body>
<div class="scroll-left">
  <h1 style="color: #ccc; white-space:nowrap;">Testing 123</h1>
</div>

</body>
</html>