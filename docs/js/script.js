function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("浏览器不支持地理位置功能。");
    }
}
// 显示经纬度信息
function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    
    // 在页面上显示经纬度信息
    alert("纬度：" + latitude + "\n经度：" + longitude);
    
    // 将经纬度信息发送到后端处理
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // 显示后端返回的结果
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };
    xhr.send("latitude=" + latitude + "&longitude=" + longitude);
}
// 访问摄像头
function accessCamera() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            document.getElementById('camera').srcObject = stream;
        })
        .catch(function(err) {
            console.log("访问摄像头失败: " + err);
        });
}