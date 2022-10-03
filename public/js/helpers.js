
const addClass = (elem,name) => {
	let el = document.querySelector(elem);
	
	if(el){
	 el.classList.add(name);
	}
	
}

const removeClass = (elem,name) => {
	let el = document.querySelector(elem);
	
	if(el){
	 el.classList.remove(name);
	}
	
}

const showElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		removeClass(names[i],"hidden");
	    addClass(names[i],"visible");
	}
}

const hideElem = (name) => {
	let names = [];
	
	if(Array.isArray(name)){
	  names = name;
	}
	else{
		names.push(name);
	}
	
	for(let i = 0; i < names.length; i++){
		removeClass(names[i],"visible");
    	addClass(names[i],"hidden");
	}
	
}




function buupFire(){
	 let bc = localStorage.getItem("buupCtr");
	     if(!bc) bc = "0";
		 
		 
		
		 let fd = new FormData();
		 fd.append("dt",JSON.stringify(BUUPlist[bc]));
		 imgs = []; covers = [];
		
		//imgs = $(`${BUPitem}-image`)[0].files;
		imgs = $(`${BUUPlist[bc].id}-images-div input[type=file]`);
		cover = $(`${BUUPlist[bc].id}-images-div input[type=radio]:checked`);
		console.log("imgs: ",imgs);
		console.log("cover: ",cover);
		
		for(let r = 0; r < imgs.length; r++)
		 {
		    let imgg = imgs[r];
			let imgName = imgg.getAttribute("name");
            console.log("imgg name: ",imgName);			
            console.log("cover: ",cover.val());
            fd.append(imgName,imgg.files[0]);   			   			
		 }
		 
		 fd.append(cover.attr("name"),cover.val());
		 
		 
		 fd.append("_token",$('#tk').val());
		 console.log("fd: ",fd);
         
	
	//create request
	const req = new Request("buup",{method: 'POST', body: fd});
	//console.log(req);
	
	
	//fetch request
	fetch(req)
	   .then(response => {
		   if(response.status === 200){
			   //console.log(response);
			   
			   return response.json();
		   }
		   else{
			   return {status: "error:", message: "Network error"};
		   }
	   })
	   .catch(error => {
		    alert("Failed to upload product: " + error);			
	   })
	   .then(res => {
		   console.log(res);
          bc = parseInt(bc) + 1;
			     localStorage.setItem("buupCtr",bc);
				 
		   if(res.status == "ok"){
                  $('#result-ctr').html(bc);
		   }
		   else if(res.status == "error"){
				     alert("An unknown network error has occured. Please refresh the app or try again later");			   
		   }
		   
		    setTimeout(function(){
			       if(bc >= buupCounter){
					  $('#result-box').hide();
					  $("#finish-box").fadeIn();
					  window.location = "buup";
				  }
                  else{
					 buupFire();
				  }				  
		    },4000);
		   
		  
	   }).catch(error => {
		    alert("Failed to send message: " + error);			
	   });
}

