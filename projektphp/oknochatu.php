<?php
echo "
<p>Enable Chat</p>
    <input id='chatcheckbox' type='checkbox' onchange='checkboxhandler(); polling();'>
<div id='chatwindow' style='visibility: hidden;' >
        <div class='userData'>
            <h2>Chat</h2>
            <label>Name:</label>
            <input id='namewindow' type='text' name='name'><br/>
        </div>

        <textarea readonly id='messages' type='textarea' cols='20' rows='10' class='chatConversation'>
        </textarea>

        <div class='footer'>
            <label>Message:</label>
            <textarea id='chatinput' name='message' placeholder='Chat'></textarea>
            </br><button id='sendButton' onclick='send(this)'>Send</button>

        </div>
    </div>
    "
?>
