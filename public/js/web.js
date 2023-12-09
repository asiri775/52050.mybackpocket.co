$(document).on("click", '[data-toggle="tab"]', function(e){
    let obj = $(this);
    let mainContentWrapper = obj.closest(".tab-content-wrapper");
    let target = obj.attr("href");
    mainContentWrapper.find(".tab-pane").removeClass("active");
    mainContentWrapper.find('[data-toggle="tab"]').removeClass("active");
    mainContentWrapper.find('.nav li').removeClass("active");
    mainContentWrapper.find(target).addClass("active");
    obj.addClass("active");
    obj.closest("li").addClass("active");
    e.preventDefault();
});


$(document).on("click", ".togglePassField", function () {          
    var obj = $(this);
    var iconElem = obj.find("i");
    console.log(iconElem); 
    var formGroup = obj.closest('.form-group');
    if (iconElem.hasClass('icofont-eye')) {
        formGroup.find('input').attr('type', 'text');
        iconElem.removeClass('icofont-eye').addClass('icofont-eye-blocked');
    }else{
        formGroup.find('input').attr('type', 'password');
        iconElem.removeClass('icofont-eye-blocked').addClass('icofont-eye');
    }
});

      