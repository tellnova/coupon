/**
Nova coupon get func
2013/8/13
**/

function CreateListBody(data) {  

    var arr = data;
    var display_mode1 = "block";
    var display_mode2 = "none";

    var newChild=document.createElement('li'); 
	
	var imgsrc = "./images/" + arr.id + ".png";
    ///
    var newLinka0=document.createElement('a');
    newLinka0.id="card" + arr.id;
    newLinka0.setAttribute('href',"javascript:void(0);");
    newLinka0.setAttribute('onclick',"addToCardBag(" + arr.id + ")");

    var newImg=document.createElement('img');
    newImg.setAttribute('src', imgsrc);
    newImg.setAttribute('style',"width: 60px; height: 60px; margin-top: 0px; margin-left: 0px;");

    var newImgP=document.createElement('p');
    newImgP.appendChild(newImg);

    var newH1=document.createElement('h1');
    newH1.innerHTML= arr.name;

    var newH2=document.createElement('h2');
    newH2.innerHTML= arr.des;

    newLinka0.appendChild(newImgP);
    newLinka0.appendChild(newH1);
    newLinka0.appendChild(newH2);

    newChild.appendChild(newLinka0);  


    if(arr.inbag){
        display_mode1 = "none";
        display_mode2 = "block";
        newLinka0.setAttribute('onclick',"gotourl(" + arr.id + ")");
    }


    ///
    var newLink1=document.createElement('span');
    var newText1=document.createTextNode('领卡');
    newLink1.setAttribute('class',"s1");
    newLink1.appendChild(newText1);

    var newLinka1=document.createElement('a');
    newLinka1.setAttribute('href',"javascript:;");
    newLinka1.setAttribute('onclick',"addToCardBag(" + arr.id + ")");
    newLinka1.id=arr.id;
    newLinka1.setAttribute('style',"display:"+ display_mode1);        
    newLinka1.appendChild(newLink1);

    newChild.appendChild(newLinka1);  


    ///
    var newLink2=document.createElement('span');
    var newText2=document.createTextNode('用卡');
    newLink2.setAttribute('class',"s2");
    newLink2.appendChild(newText2);

    var newLinka2=document.createElement('a');
    newLinka2.setAttribute('href',"javascript:;");
    newLinka2.setAttribute('onclick',"gotourl(" + arr.id + ")");
    newLinka2.id=arr.id + "@";
    newLinka2.setAttribute('style',"display:" + display_mode2);        
    newLinka2.appendChild(newLink2);

    newChild.appendChild(newLinka2); 


    var mcList=document.getElementById("mc_list");
    var cardBagList=document.getElementById("mc_cards");
    //把新的li元素节点添加到 ul 元素节点里  

    if(!arr.mycards)
        mcList.appendChild(newChild); 
    else
        cardBagList.appendChild(newChild); 

}

function CreatePromotionBody(data)
{
    var arr = data;

    var newChild=document.createElement('div'); 
    newChild.setAttribute('data-role',"collapsible");
    newChild.setAttribute('data-iconpos',"right");
    newChild.setAttribute('data-theme',"c");
	newChild.setAttribute('data-content-theme',"d");
    newChild.id="down_contents";

    var newHeader=document.createElement('h3');
    newHeader.innerHTML=arr.prom_title;
    newChild.appendChild(newHeader); 

    var newTitle=document.createElement('h4');
    newTitle.innerHTML=arr.prom_title;
    newChild.appendChild(newTitle); 

    duration = arr.prom_duration.split(",");

    var newContent=document.createElement('p');
    newContent.innerHTML=arr.prom_body;
    newContent.innerHTML+="</br></br>活动时间：";
    newContent.innerHTML+=duration[0] + " -- " + duration[1];
    newChild.appendChild(newContent); 

    var promParent=document.getElementById("promotion_list");
    promParent.appendChild(newChild);
}

function CreateContactBody()
{
    // var arr = data;

    var newChild1=document.createElement('div'); 
    newChild1.setAttribute('data-role',"collapsible");
    newChild1.setAttribute('data-iconpos',"right");
    newChild1.setAttribute('data-theme',"c");
	newChild1.setAttribute('data-content-theme',"d");
    newChild1.id="down_contents";

    var newChild2=document.createElement('div'); 
    newChild2.setAttribute('data-role',"collapsible");
    newChild2.setAttribute('data-iconpos',"right");
    newChild2.setAttribute('data-theme',"c");
	newChild2.setAttribute('data-content-theme',"d");
    newChild2.id="down_contents";

    var newHomeHeader=document.createElement('h3');
    newHomeHeader.innerHTML="会员卡说明";
    newChild1.appendChild(newHomeHeader); 

    var newContent1=document.createElement('p');
    newContent1.innerHTML="聚美优品微信每月都有丰富的活动，并有接连不断丰厚的奖品派发给微信用户，而所有的获奖名单都是以抽取黑钻卡号为准的。独一无二的黑钻卡号避免了因微信名重复造成的领奖误会！";
    newChild1.appendChild(newContent1); 

    var newContactHeader=document.createElement('h3');
    newContactHeader.innerHTML="适用门店电话及地址";
    newChild2.appendChild(newContactHeader); 

    var newContent2=document.createElement('p');
    newContent2.innerHTML="地址:上海市闸北区延长路";
    newContent2.innerHTML+="</br>";    
    newContent2.innerHTML+="电话:18810928602";
    newChild2.appendChild(newContent2); 

    var promParent=document.getElementById("contact_list");
    promParent.appendChild(newChild1);
    promParent.appendChild(newChild2);
}

function EmptyBag()
{
    document.getElementById("empty_bag").setAttribute('style',"display:block");
}
