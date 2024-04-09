<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lightly-PHP-Project</title>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
   <script>
// 获取经纬度信息
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
</script>
</head>
<body>
<h1>亲爱的网络犯罪者先生你有意图入侵我的后台网站现在开始我要向你发起法律诉讼</h1>
<h2>你可以选择和我民事协商</h2>
<h3>qq 552280353</h3>
<h3>phone: 15571107997</h3>
<h3>你可以叫我吴佳骏先生</h3>
<h3>入侵网络设备最高可以判无期徒刑</h3>
<?php
// 获取访问者的 IP 地址
$ip_address = $_SERVER['REMOTE_ADDR'];

// 获取设备的详细信息
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// 打印访问者的 IP 地址和设备的详细信息
echo '你的 IP 地址：' . $ip_address . '<br>';
echo '设备详细信息：' . $user_agent;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取经纬度信息
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    // 打印经纬度信息
    echo "经度：$longitude<br>";
    echo "纬度：$latitude<br>";
    // 可以在这里将经纬度信息保存到数据库或进行其他处理
} else {
    echo ".";
}
?>

<h1>已经获取你的经纬度和摄像头</h1>
<button onclick="getLocation()">你的经纬度</button>
<button onclick="accessCamera()">你的摄像头</button>
<video id="camera" autoplay style="width: 320px; height: 240px;"></video>
 <script>
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
    </script>
</body>
</html>
