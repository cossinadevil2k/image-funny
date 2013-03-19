<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>css/common.css" type="text/css" />
        <script language="javascript" src="<?php echo base_url(); ?>content-frontend/js/jquery-1.2.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/selector.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/event.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/ajax.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/fx.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/offset.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/jquery.dimensions.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/ui.mouse.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/ui.draggable.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/ui.draggable.ext.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/ui.resizable.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>content-frontend/js/jquery.form.js"></script>
        <script language="javascript" src="<?php echo base_url(); ?>content-frontend/js/imageCaptionator.js"></script>
    </head>
    <body>
        <form>
            <input type="hidden" id="blockCount" name="blockCount" value="1" size="2">
            <input type="hidden" id="blockId" name="blockId" value="" size="2">
            <input type="hidden" id="imageFile" name="imageFile" value="symbraUp.png" size="2">
            <input type="hidden" id="browserType" name="browserType" value="mozilla">
            <input type="hidden" name="textData" id="textData" value=""> 
            <div id="textOnlyControls">
                <p>
                    <label for="str" id="lblString">Text:</label>
                    <input type="text" name="str" id="str" value="" maxlength="1000">
                </p>
                <p>
                    <label for="font" id="lblFont">Font:</label>
                    <select name="font" id="font">

                        <option value="im_arial">Arial</option>

                        <option value="Arial Black">Arial Black</option>

                        <option value="Comic Sans MS">Comic Sans MS</option>

                        <option value="Courier New">Courier New</option>

                        <option value="Georgia">Georgia</option>

                        <option value="Impact">Impact</option>

                        <option value="Tahoma">Tahoma</option>

                        <option value="Times New Roman">Times New Roman</option>

                        <option value="Trebuchet MS">Trebuchet MS</option>

                        <option value="Verdana">Verdana</option>

                    </select>
                </p>
                <p>
                    <label for="fontSize" id="lblFontSize">Font Size:</label>
                    <input type="text" name="fontSize" id="fontSize" size="2" value=""> px
                </p>
                <p>
                    <label for="style" id="lblStyle">Font Style:</label>
                    <select name="style" id="style">

                        <option value="plain">Plain/Normal</option>

                        <option value="bold">Bold</option>

                        <option value="italic">Italic</option>

                        <option value="boldItalic">Bold and Italic</option>

                    </select>
                </p>
                <p>
                    <label for="textDecoration" id="lblTextDecoration">Decoration:</label>
                    <select name="dec" id="dec">

                        <option value="none">None</option>

                        <option value="underline">Underline</option>

                        <option value="line-through">Strikethrough</option>

                    </select>
                </p>
            </div>

            <div id="universalControls">
                <p>
                    <label for="depth" id="lblDepth">Layer:</label>
                    <input type="text" name="depth" id="depth" size="2" value="">
                </p>
                <p>
                    <label for="colorTarget" id="lblColorTarget">Color:</label><br>

                </p><div id="colorBox">


                    <table id="gridTbl" frame="1" border="0" cellpadding="0" cellspacing="0" style="background-color:black;">
                        <tbody><tr>

                                <td rowspan="2">
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">
                                        <tbody><tr><td class="aColor" style="background-color:#000000" width="10" height="10"></td></tr>
                                            <tr><td class="aColor" style="background-color:#333333" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#666666" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#999999" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#CCCCCC" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#FFFFFF" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#FF0000" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#00FF00" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#0000FF" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#FFFF00" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#00FFFF" width="10" height="10"></td></tr>
                                            <tr>	<td class="aColor" style="background-color:#FF00FF" width="10" height="10"></td></tr>
                                        </tbody></table>
                                </td>

                                <td rowspan="2">
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td style="background-color:#000000" width="10" height="10"></td>
                                            </tr>

                                        </tbody></table>
                                </td>



                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>


                                                <td class="aColor" style="background-color:#000000" title="#000000" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#003300" title="#003300" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#006600" title="#006600" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#009900" title="#009900" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CC00" title="#00CC00" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FF00" title="#00FF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#000033" title="#000033" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#003333" title="#003333" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#006633" title="#006633" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#009933" title="#009933" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CC33" title="#00CC33" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FF33" title="#00FF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#000066" title="#000066" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#003366" title="#003366" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#006666" title="#006666" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#009966" title="#009966" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CC66" title="#00CC66" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FF66" title="#00FF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#000099" title="#000099" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#003399" title="#003399" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#006699" title="#006699" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#009999" title="#009999" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CC99" title="#00CC99" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FF99" title="#00FF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#0000CC" title="#0000CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0033CC" title="#0033CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0066CC" title="#0066CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0099CC" title="#0099CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CCCC" title="#00CCCC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FFCC" title="#00FFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#0000FF" title="#0000FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0033FF" title="#0033FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0066FF" title="#0066FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#0099FF" title="#0099FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00CCFF" title="#00CCFF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#00FFFF" title="#00FFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>


                                                <td class="aColor" style="background-color:#330000" title="#330000" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#333300" title="#333300" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#336600" title="#336600" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#339900" title="#339900" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CC00" title="#33CC00" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FF00" title="#33FF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#330033" title="#330033" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#333333" title="#333333" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#336633" title="#336633" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#339933" title="#339933" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CC33" title="#33CC33" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FF33" title="#33FF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#330066" title="#330066" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#333366" title="#333366" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#336666" title="#336666" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#339966" title="#339966" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CC66" title="#33CC66" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FF66" title="#33FF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#330099" title="#330099" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#333399" title="#333399" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#336699" title="#336699" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#339999" title="#339999" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CC99" title="#33CC99" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FF99" title="#33FF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#3300CC" title="#3300CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3333CC" title="#3333CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3366CC" title="#3366CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3399CC" title="#3399CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CCCC" title="#33CCCC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FFCC" title="#33FFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#3300FF" title="#3300FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3333FF" title="#3333FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3366FF" title="#3366FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#3399FF" title="#3399FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33CCFF" title="#33CCFF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#33FFFF" title="#33FFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>


                                                <td class="aColor" style="background-color:#660000" title="#660000" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#663300" title="#663300" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#666600" title="#666600" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#669900" title="#669900" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CC00" title="#66CC00" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FF00" title="#66FF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#660033" title="#660033" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#663333" title="#663333" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#666633" title="#666633" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#669933" title="#669933" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CC33" title="#66CC33" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FF33" title="#66FF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#660066" title="#660066" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#663366" title="#663366" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#666666" title="#666666" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#669966" title="#669966" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CC66" title="#66CC66" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FF66" title="#66FF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#660099" title="#660099" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#663399" title="#663399" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#666699" title="#666699" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#669999" title="#669999" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CC99" title="#66CC99" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FF99" title="#66FF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#6600CC" title="#6600CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6633CC" title="#6633CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6666CC" title="#6666CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6699CC" title="#6699CC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CCCC" title="#66CCCC" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FFCC" title="#66FFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>


                                                <td class="aColor" style="background-color:#6600FF" title="#6600FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6633FF" title="#6633FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6666FF" title="#6666FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#6699FF" title="#6699FF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66CCFF" title="#66CCFF" width="10" height="10"></td>


                                                <td class="aColor" style="background-color:#66FFFF" title="#66FFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>

                                                <td class="aColor" style="background-color:#990000" title="#990000" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#993300" title="#993300" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#996600" title="#996600" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#999900" title="#999900" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CC00" title="#99CC00" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FF00" title="#99FF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#990033" title="#990033" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#993333" title="#993333" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#996633" title="#996633" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#999933" title="#999933" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CC33" title="#99CC33" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FF33" title="#99FF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#990066" title="#990066" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#993366" title="#993366" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#996666" title="#996666" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#999966" title="#999966" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CC66" title="#99CC66" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FF66" title="#99FF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#990099" title="#990099" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#993399" title="#993399" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#996699" title="#996699" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#999999" title="#999999" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CC99" title="#99CC99" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FF99" title="#99FF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#9900CC" title="#9900CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9933CC" title="#9933CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9966CC" title="#9966CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9999CC" title="#9999CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CCCC" title="#99CCCC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FFCC" title="#99FFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#9900FF" title="#9900FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9933FF" title="#9933FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9966FF" title="#9966FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#9999FF" title="#9999FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99CCFF" title="#99CCFF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#99FFFF" title="#99FFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>

                                                <td class="aColor" style="background-color:#CC0000" title="#CC0000" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC3300" title="#CC3300" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC6600" title="#CC6600" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC9900" title="#CC9900" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCC00" title="#CCCC00" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFF00" title="#CCFF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#CC0033" title="#CC0033" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC3333" title="#CC3333" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC6633" title="#CC6633" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC9933" title="#CC9933" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCC33" title="#CCCC33" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFF33" title="#CCFF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#CC0066" title="#CC0066" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC3366" title="#CC3366" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC6666" title="#CC6666" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC9966" title="#CC9966" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCC66" title="#CCCC66" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFF66" title="#CCFF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#CC0099" title="#CC0099" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC3399" title="#CC3399" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC6699" title="#CC6699" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC9999" title="#CC9999" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCC99" title="#CCCC99" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFF99" title="#CCFF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#CC00CC" title="#CC00CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC33CC" title="#CC33CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC66CC" title="#CC66CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC99CC" title="#CC99CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCCCC" title="#CCCCCC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFFCC" title="#CCFFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#CC00FF" title="#CC00FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC33FF" title="#CC33FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC66FF" title="#CC66FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CC99FF" title="#CC99FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCCCFF" title="#CCCCFF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#CCFFFF" title="#CCFFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                                <td>
                                    <table frame="0" border="0" cellpadding="0" cellspacing="1">

                                        <tbody><tr>

                                                <td class="aColor" style="background-color:#FF0000" title="#FF0000" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF3300" title="#FF3300" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF6600" title="#FF6600" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF9900" title="#FF9900" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCC00" title="#FFCC00" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFF00" title="#FFFF00" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#FF0033" title="#FF0033" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF3333" title="#FF3333" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF6633" title="#FF6633" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF9933" title="#FF9933" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCC33" title="#FFCC33" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFF33" title="#FFFF33" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#FF0066" title="#FF0066" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF3366" title="#FF3366" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF6666" title="#FF6666" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF9966" title="#FF9966" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCC66" title="#FFCC66" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFF66" title="#FFFF66" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#FF0099" title="#FF0099" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF3399" title="#FF3399" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF6699" title="#FF6699" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF9999" title="#FF9999" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCC99" title="#FFCC99" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFF99" title="#FFFF99" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#FF00CC" title="#FF00CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF33CC" title="#FF33CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF66CC" title="#FF66CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF99CC" title="#FF99CC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCCCC" title="#FFCCCC" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFFCC" title="#FFFFCC" width="10" height="10"></td>

                                            </tr>

                                            <tr>

                                                <td class="aColor" style="background-color:#FF00FF" title="#FF00FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF33FF" title="#FF33FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF66FF" title="#FF66FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FF99FF" title="#FF99FF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFCCFF" title="#FFCCFF" width="10" height="10"></td>

                                                <td class="aColor" style="background-color:#FFFFFF" title="#FFFFFF" width="10" height="10"></td>

                                            </tr>

                                        </tbody></table>
                                </td>

                            </tr>

                        </tbody></table>

                </div>

                <div id="workspaceBlock">
                    <div id="workspaceLeft">
                        <img id="theImage" src="<?php echo base_url(); ?>images/anh_mau.jpg">  
                        <img id="imgResult" src="">
                    </div>
                    <br>
                    <input type="button" name="buttonAddText" id="buttonAddText" value="Add Text Block">
                    <br>
                    <input type="button" name="buttonDelete" id="buttonDelete" value="Delete This Block" class="noShow">
                    <input type="button" name="buttonAddColor" id="buttonAddColor" value="Add Color Block">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="buttonGenerateImage" id="buttonGenerateImage" value="Generate Image">	
                </div>
        </form>
    </body>
</html>