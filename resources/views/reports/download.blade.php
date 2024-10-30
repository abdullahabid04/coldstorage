<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentron Report</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .page {
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .header::after {
            content: "Sentron Report";
        }

        .footer .tagline::after {
            content: "Sentron";
        }

        .footer .page-num::after {
            content: counter(page);
        }

        hr {
            border: none;
            margin: 16px 0;
            border-top: 1px solid #aaa
        }

        #details .item span {
            color: #01b9bc;
        }

        .logo {}
    </style>
</head>

<?php
$client = $type !== 'area' ? $entity->title : $entity->title . " of " . $entity->store->title;

$sentronSrc = getBase64Image('assets/img/icons/logo.png');
$caSrc = getBase64Image('assets/img/ca_logos/ca_logo_name_tagline_down_bg_removed_upscaled.png');
?>

<body>
    <div class="page" id="page-1">
        <div class="header"></div>
        <div class="content">
            <div id="brand-logos">
                <div class="logo">
                    <img src="<?= $caSrc ?>" alt="Cosmos Algos logo">
                </div>
                <div class="logo">
                    <img src="<?= $caSrc ?>" alt="Cosmos Algos logo">
                </div>
            </div>
            <hr>
            <div id="details">
                <div class="item">
                    <span>Report Title:</span> Sentron Report
                </div>
                <div class="item">
                    <span>Client: </span> <?= $client ?>
                </div>
                <div class="item">
                    <span>Prepared By:</span> Sentron by Cosmos Algos Pvt. Ltd.
                </div>
                <div class="item">
                    <span>Publication Date:</span> <?= $pubDate ?>
                </div>
                <div class="item">
                    <span>Time Span: </span> <?= "$startDate to $endDate" ?>
                </div>
            </div>
            <hr>
            <div id="product-logo">
                <img src="<?= $sentronSrc ?>" alt="Sentron logo">
            </div>
        </div>
        <div class="footer">
            <div class="tagline"></div>
        </div>
    </div>

    <div class="page">
        <div class="header"></div>
        <div class="content"></div>
        <div class="footer">
            <div class="tagline"></div>
            <div class="page-num"></div>
        </div>
    </div>

</body>

</html>
