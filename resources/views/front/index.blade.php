<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .header .nav {
            display: flex;
            gap: 20px;
        }
        .header .nav a {
            text-decoration: none;
            color: #333;
        }
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
        }
        .hero .text {
            flex: 1;
        }
        .hero .text h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero .text p {
            font-size: 18px;
            line-height: 1.5;
        }
        .hero .image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero .image img {
            max-width: 100%;
            height: auto;
        }
        .partners {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px;
            gap: 20px;
        }
        .partners .partner {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            height: 100px;
            border-radius: 10px;
            background-color: #f0f0f0;
        }
        .partners .partner img {
            max-width: 100%;
            height: auto;
        }
        .event {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }
        .event h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .event .video {
            position: relative;
            width: 600px;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
        }
        .event .video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .event .video .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .blog {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px;
            gap: 20px;
        }
        .blog .post {
            display: flex;
            flex-direction: column;
            width: 300px;
            border-radius: 10px;
            overflow: hidden;
        }
        .blog .post .image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .blog .post .content {
            padding: 20px;
        }
        .blog .post .content h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .blog .post .content p {
            font-size: 14px;
            line-height: 1.5;
        }
        .blog .post .content a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #333;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .footer .social {
            display: flex;
            gap: 10px;
        }
        .footer .social a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                iNaraiCoder
            </div>
            <div class="nav">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div class="hero">
            <div class="text">
                <h1>Bertumbuh dengan kolaborasi, Menuju visi "Bersinergi, Berkolaborasi dan Berinovasi"</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, aperiam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, aperiam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, aperiam.</p>
                <button>Bergabung</button>
            </div>
            <div class="image">
                <img src="https://i.imgur.com/h37M4j9.png" alt="Hero Image">
            </div>
        </div>
        <div class="partners">
            <div class="partner">
                <img src="https://i.imgur.com/B01g50G.png" alt="Partner 1">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/fJ59D7W.png" alt="Partner 2">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/V3aQ0eS.png" alt="Partner 3">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/Xv4O0eS.png" alt="Partner 4">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/4yD11jZ.png" alt="Partner 5">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/i1786q1.png" alt="Partner 6">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/H0lK9zF.png" alt="Partner 7">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/06uU2dG.png" alt="Partner 8">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/5u6C89W.png" alt="Partner 9">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/6X5d68W.png" alt="Partner 10">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/J1t0X3v.png" alt="Partner 11">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/z36wC8s.png" alt="Partner 12">
            </div>
            <div class="partner">
                <img src="https://i.imgur.com/c2J2L6L.png" alt="Partner 13">
            </div>
        </div>
        <div class="event">
            <h2>Event</h2>
            <div class="video">
                <video src="https://www.youtube.com/watch?v=dQw4w9WgXcQ" controls></video>
                <div class="play-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697c-.21-.21-.45-.356-.78-.468-.328-.11-.662-.253-.901-.407C7.55 4.05 5.55 2.1 3.394 1.157a.837.837 0 0 0-.113.022A7.96 7.96 0 0 0 2 7.725c0 2.064 1.67 3.725 3.88 3.725a.837.837 0 0 0 .114-.022A7.96 7.96 0 0 0 14 7.725c0-2.064-1.67-3.725-3.88-3.725a.837.837 0 0 0-.113.022A7.958 7.958 0 0 0 11.596 8.697z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="blog">
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 1">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 2">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 3">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 4">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 5">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="post">
                <div class="image">
                    <img src="https://i.imgur.com/H17kF5s.png" alt="Post 6">
                </div>
                <div class="content">
                    <h3>long established</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
