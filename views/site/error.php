<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">
    <?php //debug($exception);?>
    <?php if ($exception->statusCode == 404): ?>
    <center>
        <table cellspacing="5" cellpadding="3" width="400">
            <tbody>
            <tr>
                <td id="tableprops" valign="top" align="left">
                    <img height="33" src="http://ucozua.ru/Scripts/13/9ac78731d2dc.bmp" width="25">
                </td>
                <td id="tableprops2" valign="middle" align="left" width="360">
                    <h1 id="textSection1" style="FONT: 13pt/15pt verdana; COLOR: black">
                        <span id="errorText">Кончился Интернет, всё приехали...</span>
                    </h1>
                </td>
            </tr>
            <tr>
                <td id="tablepropsWidth1" width="400" colspan="2">
                    <font style="FONT: 8pt/11pt verdana; COLOR: black">
                        Поздравляем! Админы нажрались и выключили электричество!. Больше не будет ссылок, прикольных
                        картинок, свежих анекдотов и порнографии.
                    </font>
                </td>
            </tr>
            <tr>
                <td id="tablepropsWidth" width="400" colspan="2">
                    <font id="liD1" style="FONT: 8pt/11pt verdana; COLOR: black">
                        <hr color="#c0c0c0" noshade="">

                        <p id="liD2">Попробуйте следующее:</p>
                        <ul>
                            <li id="instructionsText1">
                                Включите телевизор и посмотрите мультфильмы, какой-нибудь боевик, детектив, телесериал
                                или просто новости. <br>
                            </li>
                            <li id="instructionsText2">
                                Бахните пивка, а лучше водки и закусите огурцом, чтобы залить печаль :)<br>
                            </li>
                            <li id="instructionsText3">
                                Выключите свой компьютер нафиг и ложитесь спать.
                            </li>
                            <li id="list4">
                                Если это разрешено действующим Законодательством вашей
                                страны, последовательно отсоедините от системного блока компьютера шнуры
                                питания, модема, затем - шнуры видеокарты и принтера, после чего
                                выбросьте системный блок и монитор компьютера в окно.
                            </li>
                        </ul>


                        <br><br>
                        <hr color="#c0c0c0" noshade="">



                        <br><br>
                        <h2 id="IEText" style="FONT: 8pt/11pt verdana; COLOR: black">Ошибка
                            Microsoft Internet Explorer номер 404 - Интернет закончился к чертям
                            собачьим. <br>
                        </h2>
                    </font>
                </td>
            </tr>
            </tbody>
        </table>
    </center>
    <?php endif; ?>
    <h1><?//= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p> </p>
    <p> </p>

</div>
