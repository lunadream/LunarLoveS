<script type="text/javascript">

 var bodyBgs = [];
 bodyBgs[0] = "./image/bg_1.jpg";
 bodyBgs[1] = "./image/bg_2.jpg";

 var randomBgIndex = Math.round( Math.random() * 1 );

 document.write("<style>body{background:url(" + bodyBgs[randomBgIndex] + ") no-repeat 50% 0}</style>");

</script>
