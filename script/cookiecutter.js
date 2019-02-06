// var user = "admin";

// //criação, decodificação e leitor de cookies.
// function setCookie(Cookiename, Cookievalue, exdays){
//     var d= new Date();
//     d.setTime(d.getTime() + (exdays*24*60*60*1000));
//     var expires = "expires="+ d.toUTCString();
//     document.cookie = Cookiename + "=" + Cookievalue + ";" + expires + ";path=/";
// }

// function getCookie(cname) {
//     var name = cname + "=";
//     var decodedCookie = decodeURIComponent(document.cookie);
//     var ca = decodedCookie.split(';');
//     for(var i = 0; i < ca.length; i++) {
//       var c = ca[i];
//       while (c.charAt(0) == ' ') {
//         c = c.substring(1);
//       }
//       if (c.indexOf(name) == 0) {
//         return c.substring(name.length, c.length);
//       }
//     }
//     return null;
//   }

//   setCookie("_CID", user , 30);

// function cookielogger(){
//   if(getCookie("_CID")!=null){
//     document.getElementById("Username").value = getCookie("_CID");
//     document.getElementById("Password").value = getCookie("_CID");
//     alert("got cooka");
//   }
//   alert("no cookie")
// }

// function cookiekiller(){
//   if(getCookie("_CID")!=null){
//     setCookie("_CID",user,-1000);
//     alert("kill");
//   }
  
// }
