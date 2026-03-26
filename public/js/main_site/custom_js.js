//scroll to load data
$(document).scroll(function(){
// lead news and caption news section news
if($(this).scrollTop()==$("#caption_new_section").offset().top){
$("#caption_new_section").fadeIn(100);
$("#render_news").html("<img src='storage/img/bg-img/loading.gif' alt='loading.....' style='margin:0 auto;'>");
$.ajax({
url:"./ajax/caption_news_section",
method:"get",
dataType:"json",
data:{
section:"caption_news_section"
},
success:function(data){
if(data!=""){
var text="";
$.each(data, function(key, val){
text+='<div class="col-12 col-lg-4"><div class="single-blog-post"><div class="post-thumb"><a   href="./news_details/'+data[key].news.post_url_bng+'"><img src="'+data[key].img+'" alt="caption_news"></a></div><div class="post-data"><a   href="./news_details/'+data[key].news.post_url_bng+'" class="post-title"><h6>'+data[key].news.post_title_bng+'</h6></a></div></div></div>';
});
$("#render_news").html(text);
}
}
});
}
// lead news and caption news section news

// sastho sheba nwws section
if($(this).scrollTop()==$("#sastho_seba_section").offset().top ){
$("#sastho_seba_section").fadeIn(100);
$("#sastho_seba_main_news").html("<img src='storage/img/bg-img/loading.gif' alt='loading.....' style='margin:0 auto;'>");
$.ajax({
url:"./ajax/sastho_seba_section",
method:"get",
dataType:"json",
data:{
section:"sastho_seba_section"
},
success:function(data1){
if(data1!=""){
var text1="";
$.each(data1, function(key, val){
text1+='<div class="col-12 col-md-6">';
text1+='<div class="single-blog-post style-3">';
text1+='<div class="post-thumb">';
text1+='<a   href="./news_details/'+data1[key].news.post_url_bng+'"><img src="'+data1[key].img+'" alt="s_lead_news_1"></a>';    
text1+='</div>';
text1+='<div class="post-data">';
text1+='<a   href="./news_details/'+data1[key].news.post_url_bng+'" class="post-title"><h6>'+data1[key].news.post_title_bng+'</h6></a>';
text1+='</div>';
text1+='</div>';
text1+='</div>';
});
$("#sastho_seba_main_news").html(text1);
//caption news ajax
$.ajax({
url:"./ajax/s_caption_news",
method:"get",
dataType:"json",
data:{
section:"s_caption_news"
},
success:function(data2){
if(data2!=""){
$("#s_c_n").html("<img src='storage/img/bg-img/loading.gif' alt='loading.....' style='margin:0 auto;'>");
var text2 = "";
$.each(data2, function(key, val){
text2+='<div class="col-sm-6">';
text2+='<div class="single-blog-post small-featured-post d-flex">';
text2+='<div class="post-thumb">';
text2+='<a   href="./news_details/'+data2[key].c_news.news.post_url_bng+'"><img src="'+data2[key].c_news.img+'" alt="s_caption_news_'+key+'"></a>';
text2+='</div>';
text2+='<div class="post-data">';
text2+='<div class="post-meta">';
text2+='<a   href="./news_details/'+data2[key].c_news.news.post_url_bng+'" class="post-title">';
text2+='<h6>'+data2[key].c_news.news.post_title_bng+'</h6>';
text2+='</a>';                            
text2+='</div>';
text2+='</div>';
text2+='</div>';
text2+=' </div>';
});
$("#s_c_n").html(text2);

}
}
});
//caption news ajax
}
}
});
//latest news
$.ajax({
  url:"./ajax/last_news",
  method:"get",
  dataType:"json",
  data:{
  section:"last_news"
  },
  success:function(data3){
  if(data3!=""){
  var text2="";
  
  $.each(data3, function(key, val){
  text2+='<div class="single-blog-post small-featured-post d-flex">';
  text2+='<div class="post-thumb">';
  text2+='<a   href="./news_details/'+data3[key].ln_news.news.post_url_bng+'"><img src="'+data3[key].ln_news.img+'" alt="last_news_'+key+'"></a>';    
  text2+='</div>';
  text2+='<div class="post-data">';
  text2+='<a   href="./news_details/'+data3[key].ln_news.news.post_url_bng+'" class="post-title"><h6>'+data3[key].ln_news.news.post_title_bng+'</h6></a>';
  text2+='</div>';
  text2+='</div>';
  });
  $("#last_news_details").html(text2);
  
  }
  }
  });
//latest news

}

// sastho sheba nwws section

// chikitsha sikkhya news section
if($(this).scrollTop()==$("#hide2").offset().top ){
  $("#hide2").fadeIn(100);
  $.ajax({
  url:"./ajax/t_n_c",
  method:"get",
  dataType:"json",
  data:{
  section:"t_n_c",
  limit:'10'
  },
  success:function(result){
  if(result!=""){
  var show="";
  $.each(result, function(key, val){  
    show+='<div class="single-blog-post style-3">'+
    '<div class="post-thumb"> <a   href="./news_details/'+result[key].news.post_url_bng+'"><img src="'+result[key].img+'" alt="'+key+'"></a> </div>'+
    '<div class="post-data"> <a   href="./news_details/'+result[key].news.post_url_bng+'" class="post-title">'+
    '<h6>'+result[key].news.post_title_bng+'</h6>'+
    '</a> </div>'+
    '</div>';
  });
  $("#tln").html(show);
  }
  }
  });
  $.ajax({
    url:"./ajax/m_n_t",
    method:"get",
    dataType:"json",
    success:function(result2){
    if(result2!=""){
    var show2="";
    $.each(result2, function(k, val){  
      show2+='<div class="single-blog-post style-3">'+
    '<div class="post-thumb"> <a   href="./news_details/'+result2[k].news.post_url_bng+'"><img src="'+result2[k].img+'" alt="'+k+'"></a> </div>'+
    '<div class="post-data"> <a   href="./news_details/'+result2[k].news.post_url_bng+'" class="post-title">'+
    '<h6>'+result2[k].news.post_title_bng+'</h6>'+
    '</a> </div>'+
    '</div>';
    });
    $("#mln").html(show2);
    }
    }
    }); 

    $.ajax({
      url:"./ajax/t_n_c2",
      method:"get",
      dataType:"json",
      success:function(result3){
      if(result3!=""){
      var show3="";
      $.each(result3, function(j, val){  
        show3+='<div class="single-blog-post small-featured-post d-flex">'+
        '<div class="post-thumb"> <a   href="./news_details/'+result3[j].news.post_url_bng+'"><img src="'+result3[j].img+'" alt="'+j+'"></a> </div>'+
            '<div class="post-data">'+
              '<div class="post-meta"><a   href="./news_details/'+result3[j].news.post_url_bng+'" class="post-title">'+
              '<h6>'+result3[j].news.post_title_bng+'</h6>'+
              '</a> </div>'+
            '</div>'+
          '</div>';
      });
      $("#tcn").html(show3);
      }
      }
      });
      $.ajax({
      url:"./ajax/m_n_t2",
      method:"get",
      dataType:"json",
      success: function(yuyu){
      var show4 = "";
      $.each(yuyu, function(o,v){
        show4+='<div class="single-blog-post small-featured-post d-flex">'+
        '<div class="post-thumb"> <a   href="./news_details/'+yuyu[o].news.post_url_bng+'"><img src="'+yuyu[o].img+'" alt="'+o+'"></a> </div>'+
        '<div class="post-data">'+
          '<div class="post-meta">  <a   href="./news_details/'+yuyu[o].news.post_url_bng+'" class="post-title">'+
          '<h6>'+yuyu[o].news.post_title_bng+'</h6>'+
          '</a> </div>'+
        '</div>'+
      '</div>';
      });
        $("#mcn").html(show4);
      }
      })
  
}


// chikitsha sikkhya news section
// ওষুধ প্রযুক্তি

// ওষুধ প্রযুক্তি
// picture gallery
if($(this).scrollTop()==$("#picture_gallery").offset().top ){
  $("#picture_gallery").fadeIn();
$.ajax({
url:'./ajax/get_picture',
method:'get',
dataType:"json",
success: function(new_data,msg){
$("#image_here").html('<a   href="./news_categories/'+new_data.image.category_id+'"><img src="'+new_data.set_as_image+'"></a>');
$("#video_image_here").html('<img src="'+new_data.vdo_img+'" alt="">');
$("#video_here").attr('href' , new_data.video.post_content_bng);
}

});

}
// picture gallery

// last news section
if($(this).scrollTop()==$("#last_sec").offset().top ){
$("#last_sec").fadeIn();

$.ajax({
url:'./ajax/last_sec',
method:'get',
dataType:'json',
data:{
section:'international'
},
success:function(di, msg){
var dit='';
var show_data = '';
$.each(di,function(key, val){
  show_data+=' <div class="single-blog-post style-3">'+
  '<div class="post-thumb"> <a   href="./news_details/'+di[key].international.news.post_url_bng+'"><img src="'+di[key].international.img+'" alt=""></a> </div>'+
   '<div class="post-data"> <a   href="./news_details/'+di[key].international.news.post_url_bng+'" class="post-title">'+
     '<h6>'+di[key].international.news.post_title_bng+'</h6>'+
     '</a></div>'+
 '</div>';

});
$('#international').html(show_data);
}

});
$.ajax({
  url:'./ajax/last_sec_c',
  method:'get',
  dataType:'json',
  data:{
  section:'international_c'
  },
  success:function(di2, msg){
  var dit='';
  var show_data2 = '';
  $.each(di2,function(key, val){
  
show_data2+='<div class="single-blog-post small-featured-post d-flex">'+
'<div class="post-thumb"> <a   href="./news_details/'+di2[key].international_c.news.post_url_bng+'"><img src="'+di2[key].international_c.img+'" alt=""></a> </div>'+
'<div class="post-data">'+
  '<div class="post-meta"> <a   href="./news_details/'+di2[key].international_c.news.post_url_bng+'" class="post-title">'+
  '<h6>'+di2[key].international_c.news.post_title_bng+'</h6>'+
    '</a> </div>'+
'</div>'+
'</div>';
  });
  $('#international_c').html(show_data2);
  }
  
  });
$.ajax({
  url:'./ajax/last_sec',
  method:'get',
  dataType:'json',
  data:{
  section:'f_n_m'
  },
  success:function(di, msg){
  var dit='';
  var show_data = '';
  $.each(di,function(key, val){
  if(key==0){
    show_data+=' <div class="single-blog-post style-3">'+
   '<div class="post-thumb"> <a   href="./news_details/'+di[key].f_n_m.news.post_url_bng+'"><img src="'+di[key].f_n_m.img+'" alt=""></a> </div>'+
    '<div class="post-data"> <a   href="./news_details/'+di[key].f_n_m.news.post_url_bng+'" class="post-title">'+
      '<h6>'+di[key].f_n_m.news.post_title_bng+'</h6>'+
      '</a></div>'+
  '</div>';
  }
  });
  $('#f_n_m').html(show_data);
  }
  
  });

  $.ajax({
    url:'./ajax/last_sec_b',
    method:'get',
    dataType:'json',
    data:{
    section:'f_n_m_b'
    },
    success:function(di, msg){
    var dit='';
    var show_data = '';
    $.each(di,function(key, val){
      show_data+='<div class="single-blog-post small-featured-post d-flex">'+
      '<div class="post-thumb"> <a   href="'+di[key].f_n_m_b.news.post_url_bng+'"><img src="'+di[key].f_n_m_b.img+'" alt=""></a> </div>'+
      '<div class="post-data">'+
        '<div class="post-meta"> <a   href="'+di[key].f_n_m_b.news.post_url_bng+'" class="post-title">'+
        '<h6>'+di[key].f_n_m_b.news.post_title_bng+'</h6>'+
          '</a> </div>'+
      '</div>'+
    '</div>';
    
    });
    $('#f_n_m_b').html(show_data);
    }
    
    });
  $.ajax({
    url:'./ajax/last_sec',
    method:'get',
    dataType:'json',
    data:{
    section:'etc'
    },
    success:function(di, msg){
    var dit='';
    var show_data = '';
    $.each(di,function(key, val){
    if(key==0){
      show_data+=' <div class="single-blog-post style-3">'+
     '<div class="post-thumb"> <a   href="./news_details/'+di[key].etc.news.post_url_bng+'"><img src="'+di[key].etc.img+'" alt=""></a> </div>'+
      '<div class="post-data"> <a   href="./news_details/'+di[key].etc.news.post_url_bng+'" class="post-title">'+
        '<h6>'+di[key].etc.news.post_title_bng+'</h6>'+
        '</a></div>'+
    '</div>';
    }else if(key>0){
    show_data+='<div class="single-blog-post small-featured-post d-flex">'+
      '<div class="post-thumb"> <a   href="./news_details/'+di[key].etc.news.post_url_bng+'"><img src="'+di[key].etc.img+'" alt=""></a> </div>'+
      '<div class="post-data">'+
        '<div class="post-meta"> <a   href="./news_details/'+di[key].etc.news.post_url_bng+'" class="post-title">'+
        '<h6>'+di[key].etc.news.post_title_bng+'</h6>'+
          '</a> </div>'+
      '</div>'+
    '</div>';
    }
    });
    $('#etc').html(show_data);
    }
    
});
$.ajax({
  url:'./ajax/last_sec_e',
  method:'get',
  dataType:'json',
  success:function(di, msg){
  var dit='';
  var show_data = '';
  $.each(di,function(key, val){
  show_data+='<div class="single-blog-post small-featured-post d-flex">'+
    '<div class="post-thumb"> <a   href="./news_details/'+di[key].etc_e.news.post_url_bng+'"><img src="'+di[key].etc_e.img+'" alt=""></a> </div>'+
    '<div class="post-data">'+
      '<div class="post-meta"> <a   href="./news_details/'+di[key].etc_e.news.post_url_bng+'" class="post-title">'+
      '<h6>'+di[key].etc_e.news.post_title_bng+'</h6>'+
        '</a> </div>'+
    '</div>'+
  '</div>';
  });
  $('#etc_e').html(show_data);
  }
  
});
}
// last news section

// final news section
if($(this).scrollTop()==$("#last_one").offset().top ){
$("#last_one").fadeIn();
$.ajax({
	url:'./ajax/last_one',
	method:'get',
	dataType:"json",
	success:function(ml_data, msg){
	var ml_news1 = "";
	var ml_news2 = "";
	$.each(ml_data, function(key, val){
    
      ml_news1+='<div class="col-12 col-md-6 col-xs-12">'+
      
      '<div class="single-blog-post style-3">'+
      '<div class="post-thumb"> <a   href="./news_details/'+ml_data[key].ml.news.post_url_bng+'"><img src="'+ml_data[key].ml.img+'" alt=""></a> </div>'+
      '<div class="post-data"> <a   href="./news_details/'+ml_data[key].ml.news.post_url_bng+'" class="post-title">'+
      '<h6>'+ml_data[key].ml.news.post_title_bng+'</h6>'+
      '</a> </div>'+
      
      '</div></div>';
		
		});
		$("#ml_news_1").html(ml_news1);
	}
	});
	$.ajax({
    url:'./ajax/last_one_s',
    method:'get',
    dataType:"json",
    success:function(ml_data_1, msg){
    var ml_news3 = "";
    
    $.each(ml_data_1, function(key, val){
      
      ml_news3+='<div class="col-12 col-md-12">'+
        
        '<div class="single-blog-post style-3">'+
        '<div class="post-thumb"> <a   href="./news_details/'+ml_data_1[key].hm.news.post_url_bng+'"><img src="'+ml_data_1[key].hm.img+'" alt=""></a> </div>'+
        '<div class="post-data"> <a   href="./news_details/'+ml_data_1[key].hm.news.post_url_bng+'" class="post-title">'+
        '<h6>'+ml_data_1[key].hm.news.post_title_bng+'</h6>'+
        '</a> </div>'+
        
        '</div></div>';
      
      });
      $("#ml_news_2").html(ml_news3);
    }
    });
	}
// final news section

});
//scroll to load data

//popular news and last news
$(document).ready(function(){
$("#popular_news") .click(function(){
$("#last_news_details").fadeOut();
$('.div').fadeIn();
$(".div").html("Loading.........");
$.ajax({
  url:"./ajax/popular_news",
  method:"get",
  dataType:"json",
  data:{
  section:"popular_news"
  },
  success:function(data3){
  if(data3!=""){
  var text2="";
  $.each(data3, function(key, val){
  
  text2+='<div class="single-blog-post small-featured-post d-flex">';
  text2+='<div class="post-thumb">';
  text2+='<a   href="./news_details/'+data3[key].pn_news.news.post_url_bng+'"><img src="'+data3[key].pn_news.img+'" alt="popular_news_'+key+'"></a>';    
  text2+='</div>';
  text2+='<div class="post-data">';
  text2+='<a   href="./news_details/'+data3[key].pn_news.news.post_url_bng+'" class="post-title"><h6>'+data3[key].pn_news.news.post_title_bng+'</h6></a>';
  text2+='</div>';
  text2+='</div>';
  
  });
  $(".div").html(text2);
  
  }
  }
  });
});
$("#last_news") .click(function(){
$('.div').fadeOut();
$("#last_news_details").fadeIn();
});
});
//popular news and last news