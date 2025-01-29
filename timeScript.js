var currenttime = new Date();
var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
var serverdate = new Date(currenttime);
function padlength(what) {
    var output = (what.toString().length == 1) ? "0" + what : what
    return output
}
function displaytime() {
    //alert(currenttime);
    serverdate.setSeconds(serverdate.getSeconds() + 1)
    var datestring = montharray[serverdate.getMonth()] + " " + padlength(serverdate.getDate()) + ", " + serverdate.getFullYear()
    var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds())
    if (timestring == "23:59:59") {
        window.location.reload()
    } else {
        /*var arr = timestring.split("");
        for (i = 0; i < arr.length; i++) {
            if (arr[i] != ":") {
                arr[i] = numbers[arr[i]];
            }
        }
        timestring = arr.join("");*/
        document.getElementById("time_check").innerHTML = " " + timestring;
    }
    setTimeout('displaytime()',1000);
}
displaytime();