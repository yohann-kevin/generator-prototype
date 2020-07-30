<?php 
include_once 'layouts/head.php';
include_once 'layouts/header.php';
?>
<section>
    <h1>Générateur</h1>
    <div style="width:100%;height:75px;"></div>
    <form method="post" action="">
        <p>Activé symbole : </p>
        <label class="switch">
            <input type="checkbox" id="checkSymbol">
            <span class="slider round"></span>
        </label><br />
        <!-- <button id="btnTest" onClick="generate()">Générer</button> -->
        <a id="btnTest" onClick="generate()">Générer</a>
        <div id="generator"></div>
        <!-- <input type="text" id="generator"> -->
        <button type="submit">Enregistrer</button>
    </form>
</section>
<?php include_once 'layouts/footer.php' ?>