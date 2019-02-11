function addFile() {
    var ilePlikow = document.getElementsByClassName('file').length;
    var newFile = document.createElement("input");
    newFile.className = "file";
    newFile.type = "file";
    newFile.name = ilePlikow+1;
    newFile.setAttribute("onclick","addFile()");
    document.getElementsByName('form')[0].insertBefore(newFile,document.getElementsByName('submit')[0]);
    document.getElementsByName('form')[0].insertBefore(document.createElement("br"),document.getElementsByName('submit')[0]);
}
