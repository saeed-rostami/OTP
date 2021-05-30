//session alert

$(function () {
    let sessionValue = $("#hdnInput").data('value');
    if (sessionValue) {
        Notiflix.Notify.Success(sessionValue, {
            position: "right-bottom",
            width: "400px",
            borderRadius: 15,
            fontSize: 20,
            cssAnimation: true, cssAnimationDuration: 400, cssAnimationStyle: 'zoom',
        });
    }
});
