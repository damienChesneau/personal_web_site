var taitems=function(){"use strict";var e=new Date,t,n={},r,i,s=false;if(navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)){s=true}var o=+2;var u=36e5;var a=e.getTimezoneOffset()/60;var f=new Date;var l=(o-a)*u;f.setTime(f-l);var c=null;c=[{message:null,weekday:null,start:null,end:null,lat:49.026613,lng:1.150646,toGoogle:"Evreux,  France"}];$(c).each(function(r,s){var o=null,u=null;if(n.weekday===s.weekday||s.weekday===null){if(s.start!==null){o=Date.parse(s.start)}if(s.end!==null){u=Date.parse(s.end)}if(o!==null&&u!==null){if(o<e&&u>e){t=s.message;i=s}}else{i=s;t=s.message}}});$(function(){$("#whereabouts").html("<span>"+t+"</span>");if(s){return}var e=null;var n=new Date;var o=n.getUTCMonth();e=new google.maps.LatLng(i.lat,i.lng);var u={zoom:15,center:e,disableDefaultUI:true,mapTypeId:google.maps.MapTypeId.ROADMAP};r=new google.maps.Map(document.getElementById("map"),u);$("#whereabouts").twipsy();$("#openMap").removeAttr("disabled").click(function(e){e.preventDefault();document.location="http://maps.google.com/maps?q="+i.toGoogle})});return{}}()