<div id="text_frame">
    <input type="hidden" id="blockCount" name="blockCount" value="1" size="2">
    <input type="hidden" id="blockId" name="blockId" value="" size="2">
    <input type="hidden" id="imageFile" name="imageFile" value="symbraUp.png" size="2">
    <input type="hidden" id="browserType" name="browserType" value="mozilla">
    <input type="hidden" name="textData" id="textData" value=""> 
    <div id="textOnlyControls">
        <label for="str" id="lblString">Text:</label>
        <input type="text" name="str" id="str" value="" maxlength="1000">

        <label for="font" id="lblFont">Font:</label>
        <select name="font" id="font">
            <option value="im_arial" style="font-family: im_arial !important;">Arial</option>            
            <option value="im_CourierNew" style="font-family: im_CourierNew !important">Courier New</option>
            <option value="im_PalatinoLinotype" style="font-family: im_PalatinoLinotype !important">Palatino Linotype</option>
            <option value="uvnvan_bold" style="font-family: uvnvan_bold !important">Uvnan</option>   
            <option value="im_Americana" style="font-family: im_Americana !important">Americana</option> 
            <option value="im_Androgyne" style="font-family: im_Androgyne !important">Androgyne</option> 
            <option value="im_CooperBlack" style="font-family: im_CooperBlack !important">CooperBlack</option> 
            <option value="im_CooperBlackItalic" style="font-family: im_CooperBlackItalic !important">CooperBlackItalic</option> 
        </select>
        <label for="fontSize" id="lblFontSize">Size:</label>
        <input type="text" name="fontSize" id="fontSize" size="2" value="">
        <label for="fontColor" id="lblFontSize">Màu:</label>
        <input type="text" class="minicolor" name="fontColor" id="fontColor"  value="#000000">
        <p>            
            <input type="range" id="degree" name="degree" min="-180" max="180" value="0"/>
        </p>
        <p style="display: none;">
            <label for="style" id="lblStyle">Font Style:</label>
            <select name="style" id="style">
                <option value="plain">Plain/Normal</option>
                <option value="bold">Bold</option>
                <option value="italic">Italic</option>
                <option value="boldItalic">Bold and Italic</option>
            </select>
        </p>
        <p style="display: none;">
            <label for="textDecoration" id="lblTextDecoration">Decoration:</label>
            <select name="dec" id="dec">
                <option value="none">None</option>
                <option value="underline">Underline</option>
                <option value="line-through">Strikethrough</option>
            </select>
        </p>
        <label for="depth" id="lblDepth" style="display: none;">Layer:</label>
        <input type="text" name="depth" style="display: none;" id="depth" size="2" value=""> 
        <div id="workspaceBlock">
            <div id="workspaceLeft">                                
            </div>
            <br>
            <input type="button" class="btnWatermark" name="buttonAddText" id="buttonAddText" value="Thêm Text">                        
<!--            <input type="button" class="btnWatermark" name="buttonAddColor" id="buttonAddColor" value="Add Color Block">         -->
            <input type="button" class="btnWatermark" name="buttonDelete" id="buttonDelete" value="Xóa Text" class="noShow">
            <input class="btnWatermark" type="submit" name="buttonGenerateImage" id="buttonGenerateImage" value="Hoàn Thành">	
        </div>
    </div>         
</div>

