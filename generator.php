<?php 
include_once 'layouts/head.php';
include_once 'layouts/header.php';
?>
<section>
    <div style="width:100%;height:75px;"></div>
    <p>Activé symbole : </p>
    <label class="switch">
        <input type="checkbox" id="checkSymbol">
        <span class="slider round"></span>
    </label><br />
    <button id="btnTest" onClick="generate()">Générer</button>
    <div id="generator"></div>
</section>
<?php include_once 'layouts/footer.php' ?>