@extends('adminpannel.index')
@section('key')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        body {
            background: #eee
        }
        .ico {
            width: 70px;
        }
        .action > div {
            width: 120px;
        }
        .action > div .btn {
            border-radius: 70px !important;
        }
    </style>

    <div class="container my-5">
        <div class="row">
            @foreach($order as $val)
            <div class="col-sm-10 mb-4" id="{{$val->id}}">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div class="content d-flex align-items-center justify-content-between">
                            <div class="ico">
                                <img class="img-fluid" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjUxMnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEycHgiPgo8ZyBpZD0ic3VyZmFjZTEiPgo8cGF0aCBkPSJNIDMyMC4yNjU2MjUgNDE3LjczNDM3NSBMIDE5MS43MzQzNzUgNDE3LjczNDM3NSBDIDE4My40NDkyMTkgNDE3LjczNDM3NSAxNzYuNzM0Mzc1IDQyNC40NDkyMTkgMTc2LjczNDM3NSA0MzIuNzM0Mzc1IEMgMTc2LjczNDM3NSA0NzYuNDQxNDA2IDIxMi4yOTI5NjkgNTEyIDI1NiA1MTIgQyAyOTkuNzEwOTM4IDUxMiAzMzUuMjY1NjI1IDQ3Ni40NDE0MDYgMzM1LjI2NTYyNSA0MzIuNzM0Mzc1IEMgMzM1LjI2NTYyNSA0MjQuNDQ5MjE5IDMyOC41NTA3ODEgNDE3LjczNDM3NSAzMjAuMjY1NjI1IDQxNy43MzQzNzUgWiBNIDMyMC4yNjU2MjUgNDE3LjczNDM3NSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMCUsMzUuMjk0MTE4JSw2OS40MTE3NjUlKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSAzMjAuMjY1NjI1IDQxNy43MzQzNzUgTCAyNTYgNDE3LjczNDM3NSBMIDI1NiA1MTIgQyAyOTkuNzEwOTM4IDUxMiAzMzUuMjY1NjI1IDQ3Ni40NDE0MDYgMzM1LjI2NTYyNSA0MzIuNzM0Mzc1IEMgMzM1LjI2NTYyNSA0MjQuNDQ5MjE5IDMyOC41NTA3ODEgNDE3LjczNDM3NSAzMjAuMjY1NjI1IDQxNy43MzQzNzUgWiBNIDMyMC4yNjU2MjUgNDE3LjczNDM3NSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMCUsMjAuMzkyMTU3JSwzNi4wNzg0MzElKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSAyNTYgMCBDIDE2Ny45OTYwOTQgMCA5Ni4zOTg0MzggNzEuNTk3NjU2IDk2LjM5ODQzOCAxNTkuNjAxNTYyIEMgOTYuMzk4NDM4IDIxMC4yNDYwOTQgMTIwLjI3NzM0NCAyNTcuNTExNzE5IDE2MC42Njc5NjkgMjg3LjYwNTQ2OSBMIDE2MC42Njc5NjkgMzA4LjUwNzgxMiBDIDE2MC42Njc5NjkgMzE2Ljc4OTA2MiAxNjcuMzgyODEyIDMyMy41MDc4MTIgMTc1LjY2Nzk2OSAzMjMuNTA3ODEyIEMgMTgzLjk0OTIxOSAzMjMuNTA3ODEyIDE5MC42Njc5NjkgMzE2Ljc4OTA2MiAxOTAuNjY3OTY5IDMwOC41MDc4MTIgTCAzMjEuMzM1OTM4IDMwOC41MDc4MTIgQyAzMjEuMzM1OTM4IDMxNi43OTI5NjkgMzI4LjA1MDc4MSAzMjMuNTA3ODEyIDMzNi4zMzU5MzggMzIzLjUwNzgxMiBDIDM0NC42MTcxODggMzIzLjUwNzgxMiAzNTEuMzM1OTM4IDMxNi43OTI5NjkgMzUxLjMzNTkzOCAzMDguNTA3ODEyIEwgMzUxLjMzNTkzOCAyODcuNjA1NDY5IEMgMzkxLjcyMjY1NiAyNTcuNTExNzE5IDQxNS42MDE1NjIgMjEwLjI0NjA5NCA0MTUuNjAxNTYyIDE1OS42MDE1NjIgQyA0MTUuNTk3NjU2IDcxLjU5NzY1NiAzNDQuMDAzOTA2IDAgMjU2IDAgWiBNIDI1NiAwICIgc3R5bGU9IiBzdHJva2U6bm9uZTtmaWxsLXJ1bGU6bm9uemVybztmaWxsOnJnYigxMDAlLDgxLjk2MDc4NCUsMTYuODYyNzQ1JSk7ZmlsbC1vcGFjaXR5OjE7Ii8+CjxwYXRoIGQ9Ik0gMjU2IDAgTCAyNTYgMzA4LjUwNzgxMiBMIDMyMS4zMzU5MzggMzA4LjUwNzgxMiBDIDMyMS4zMzU5MzggMzE2Ljc5Mjk2OSAzMjguMDUwNzgxIDMyMy41MDc4MTIgMzM2LjMzNTkzOCAzMjMuNTA3ODEyIEMgMzQ0LjYxNzE4OCAzMjMuNTA3ODEyIDM1MS4zMzU5MzggMzE2Ljc5Mjk2OSAzNTEuMzM1OTM4IDMwOC41MDc4MTIgTCAzNTEuMzM1OTM4IDI4Ny42MDU0NjkgQyAzOTEuNzIyNjU2IDI1Ny41MTE3MTkgNDE1LjYwMTU2MiAyMTAuMjQ2MDk0IDQxNS42MDE1NjIgMTU5LjYwMTU2MiBDIDQxNS41OTc2NTYgNzEuNTk3NjU2IDM0NC4wMDM5MDYgMCAyNTYgMCBaIE0gMjU2IDAgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsNTUuNjg2Mjc1JSwxMS4zNzI1NDklKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSA0Ny4xMzI4MTIgMTc0LjYwMTU2MiBMIDE1IDE3NC42MDE1NjIgQyA2LjcxNDg0NCAxNzQuNjAxNTYyIDAgMTY3Ljg4MjgxMiAwIDE1OS42MDE1NjIgQyAwIDE1MS4zMTY0MDYgNi43MTQ4NDQgMTQ0LjYwMTU2MiAxNSAxNDQuNjAxNTYyIEwgNDcuMTMyODEyIDE0NC42MDE1NjIgQyA1NS40MTQwNjIgMTQ0LjYwMTU2MiA2Mi4xMzI4MTIgMTUxLjMxNjQwNiA2Mi4xMzI4MTIgMTU5LjYwMTU2MiBDIDYyLjEzMjgxMiAxNjcuODgyODEyIDU1LjQxNDA2MiAxNzQuNjAxNTYyIDQ3LjEzMjgxMiAxNzQuNjAxNTYyIFogTSA0Ny4xMzI4MTIgMTc0LjYwMTU2MiAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMTAwJSw1NS42ODYyNzUlLDExLjM3MjU0OSUpO2ZpbGwtb3BhY2l0eToxOyIvPgo8cGF0aCBkPSJNIDQ5NyAxNzQuNjAxNTYyIEwgNDY0Ljg2NzE4OCAxNzQuNjAxNTYyIEMgNDU2LjU4MjAzMSAxNzQuNjAxNTYyIDQ0OS44NjcxODggMTY3Ljg4MjgxMiA0NDkuODY3MTg4IDE1OS42MDE1NjIgQyA0NDkuODY3MTg4IDE1MS4zMTY0MDYgNDU2LjU4MjAzMSAxNDQuNjAxNTYyIDQ2NC44NjcxODggMTQ0LjYwMTU2MiBMIDQ5NyAxNDQuNjAxNTYyIEMgNTA1LjI4MTI1IDE0NC42MDE1NjIgNTEyIDE1MS4zMTY0MDYgNTEyIDE1OS42MDE1NjIgQyA1MTIgMTY3Ljg4MjgxMiA1MDUuMjgxMjUgMTc0LjYwMTU2MiA0OTcgMTc0LjYwMTU2MiBaIE0gNDk3IDE3NC42MDE1NjIgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsNDIuNzQ1MDk4JSw4LjIzNTI5NCUpO2ZpbGwtb3BhY2l0eToxOyIvPgo8cGF0aCBkPSJNIDQ3LjMwMDc4MSAyOTUuMTAxNTYyIEMgNDIuMTE3MTg4IDI5NS4xMDE1NjIgMzcuMDc0MjE5IDI5Mi40MTQwNjIgMzQuMjk2ODc1IDI4Ny42MDE1NjIgQyAzMC4xNTIzNDQgMjgwLjQyNTc4MSAzMi42MTMyODEgMjcxLjI1IDM5Ljc4NTE1NiAyNjcuMTA5Mzc1IEwgNjcuNjEzMjgxIDI1MS4wNDI5NjkgQyA3NC43ODkwNjIgMjQ2Ljg5ODQzOCA4My45NjQ4NDQgMjQ5LjM1OTM3NSA4OC4xMDU0NjkgMjU2LjUzNTE1NiBDIDkyLjI0NjA5NCAyNjMuNzEwOTM4IDg5Ljc4OTA2MiAyNzIuODgyODEyIDgyLjYxMzI4MSAyNzcuMDIzNDM4IEwgNTQuNzg1MTU2IDI5My4wODk4NDQgQyA1Mi40MjU3ODEgMjk0LjQ1MzEyNSA0OS44NDc2NTYgMjk1LjEwMTU2MiA0Ny4zMDA3ODEgMjk1LjEwMTU2MiBaIE0gNDcuMzAwNzgxIDI5NS4xMDE1NjIgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsNTUuNjg2Mjc1JSwxMS4zNzI1NDklKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSA0MzYuODk0NTMxIDcwLjE3MTg3NSBDIDQzMS43MTA5MzggNzAuMTcxODc1IDQyNi42Njc5NjkgNjcuNDgwNDY5IDQyMy44OTA2MjUgNjIuNjY3OTY5IEMgNDE5Ljc1IDU1LjQ5MjE4OCA0MjIuMjA3MDMxIDQ2LjMxNjQwNiA0MjkuMzgyODEyIDQyLjE3NTc4MSBMIDQ1Ny4yMTA5MzggMjYuMTA5Mzc1IEMgNDY0LjM4NjcxOSAyMS45NjQ4NDQgNDczLjU1ODU5NCAyNC40MjU3ODEgNDc3LjcwMzEyNSAzMS42MDE1NjIgQyA0ODEuODQzNzUgMzguNzczNDM4IDQ3OS4zODY3MTkgNDcuOTQ5MjE5IDQ3Mi4yMTA5MzggNTIuMDg5ODQ0IEwgNDQ0LjM4MjgxMiA2OC4xNTYyNSBDIDQ0Mi4wMTk1MzEgNjkuNTIzNDM4IDQzOS40NDE0MDYgNzAuMTcxODc1IDQzNi44OTQ1MzEgNzAuMTcxODc1IFogTSA0MzYuODk0NTMxIDcwLjE3MTg3NSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoMTAwJSw0Mi43NDUwOTglLDguMjM1Mjk0JSk7ZmlsbC1vcGFjaXR5OjE7Ii8+CjxwYXRoIGQ9Ik0gNDY0LjY5OTIxOSAyOTUuMTAxNTYyIEMgNDYyLjE1MjM0NCAyOTUuMTAxNTYyIDQ1OS41NzQyMTkgMjk0LjQ1MzEyNSA0NTcuMjE0ODQ0IDI5My4wODk4NDQgTCA0MjkuMzgyODEyIDI3Ny4wMjczNDQgQyA0MjIuMjEwOTM4IDI3Mi44ODY3MTkgNDE5Ljc1IDI2My43MTA5MzggNDIzLjg5MDYyNSAyNTYuNTM1MTU2IEMgNDI4LjAzNTE1NiAyNDkuMzYzMjgxIDQzNy4yMDcwMzEgMjQ2LjkwMjM0NCA0NDQuMzgyODEyIDI1MS4wNDY4NzUgTCA0NzIuMjEwOTM4IDI2Ny4xMDkzNzUgQyA0NzkuMzg2NzE5IDI3MS4yNTM5MDYgNDgxLjg0NzY1NiAyODAuNDI1NzgxIDQ3Ny43MDMxMjUgMjg3LjYwMTU2MiBDIDQ3NC45MjU3ODEgMjkyLjQxMDE1NiA0NjkuODgyODEyIDI5NS4xMDE1NjIgNDY0LjY5OTIxOSAyOTUuMTAxNTYyIFogTSA0NjQuNjk5MjE5IDI5NS4xMDE1NjIgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsNDIuNzQ1MDk4JSw4LjIzNTI5NCUpO2ZpbGwtb3BhY2l0eToxOyIvPgo8cGF0aCBkPSJNIDc1LjEwMTU2MiA3MC4xNzE4NzUgQyA3Mi41NTg1OTQgNzAuMTcxODc1IDY5Ljk4MDQ2OSA2OS41MjM0MzggNjcuNjE3MTg4IDY4LjE2MDE1NiBMIDM5Ljc4OTA2MiA1Mi4wOTM3NSBDIDMyLjYxMzI4MSA0Ny45NTMxMjUgMzAuMTU2MjUgMzguNzgxMjUgMzQuMjk2ODc1IDMxLjYwNTQ2OSBDIDM4LjQzNzUgMjQuNDI5Njg4IDQ3LjYxMzI4MSAyMS45NzI2NTYgNTQuNzg5MDYyIDI2LjExMzI4MSBMIDgyLjYxNzE4OCA0Mi4xNzU3ODEgQyA4OS43ODkwNjIgNDYuMzIwMzEyIDkyLjI1IDU1LjQ5MjE4OCA4OC4xMDU0NjkgNjIuNjY3OTY5IEMgODUuMzI4MTI1IDY3LjQ4MDQ2OSA4MC4yODUxNTYgNzAuMTcxODc1IDc1LjEwMTU2MiA3MC4xNzE4NzUgWiBNIDc1LjEwMTU2MiA3MC4xNzE4NzUgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsNTUuNjg2Mjc1JSwxMS4zNzI1NDklKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSAyMjMuODY3MTg4IDMxOS4xOTkyMTkgQyAyMTUuNTgyMDMxIDMxOS4xOTkyMTkgMjA4Ljg2NzE4OCAzMTIuNDg0Mzc1IDIwOC44NjcxODggMzA0LjE5OTIxOSBMIDIwOC44NjcxODggMjMwLjA3ODEyNSBMIDE4Ny4zMjgxMjUgMjA4LjU0Mjk2OSBDIDE4MS40NzI2NTYgMjAyLjY4MzU5NCAxODEuNDcyNjU2IDE5My4xODc1IDE4Ny4zMjgxMjUgMTg3LjMyODEyNSBDIDE5My4xODM1OTQgMTgxLjQ3MjY1NiAyMDIuNjgzNTk0IDE4MS40NzI2NTYgMjA4LjUzOTA2MiAxODcuMzI4MTI1IEwgMjM0LjQ3MjY1NiAyMTMuMjYxNzE5IEMgMjM3LjI4NTE1NiAyMTYuMDc0MjE5IDIzOC44NjcxODggMjE5Ljg5MDYyNSAyMzguODY3MTg4IDIyMy44NjcxODggTCAyMzguODY3MTg4IDMwNC4xOTkyMTkgQyAyMzguODY3MTg4IDMxMi40ODQzNzUgMjMyLjE1MjM0NCAzMTkuMTk5MjE5IDIyMy44NjcxODggMzE5LjE5OTIxOSBaIE0gMjIzLjg2NzE4OCAzMTkuMTk5MjE5ICIgc3R5bGU9IiBzdHJva2U6bm9uZTtmaWxsLXJ1bGU6bm9uemVybztmaWxsOnJnYigxMDAlLDU1LjY4NjI3NSUsMTEuMzcyNTQ5JSk7ZmlsbC1vcGFjaXR5OjE7Ii8+CjxwYXRoIGQ9Ik0gMjg4LjEzMjgxMiAzMTkuMTk5MjE5IEMgMjc5Ljg0NzY1NiAzMTkuMTk5MjE5IDI3My4xMzI4MTIgMzEyLjQ4NDM3NSAyNzMuMTMyODEyIDMwNC4xOTkyMTkgTCAyNzMuMTMyODEyIDIyMy44NjcxODggQyAyNzMuMTMyODEyIDIxOS44ODY3MTkgMjc0LjcxNDg0NCAyMTYuMDc0MjE5IDI3Ny41MjczNDQgMjEzLjI2MTcxOSBMIDMwMy40NTcwMzEgMTg3LjMyODEyNSBDIDMwOS4zMTY0MDYgMTgxLjQ3MjY1NiAzMTguODEyNSAxODEuNDcyNjU2IDMyNC42NzE4NzUgMTg3LjMyODEyNSBDIDMzMC41MzEyNSAxOTMuMTg3NSAzMzAuNTMxMjUgMjAyLjY4MzU5NCAzMjQuNjcxODc1IDIwOC41NDI5NjkgTCAzMDMuMTMyODEyIDIzMC4wNzgxMjUgTCAzMDMuMTMyODEyIDMwNC4xOTkyMTkgQyAzMDMuMTMyODEyIDMxMi40ODQzNzUgMjk2LjQxNDA2MiAzMTkuMTk5MjE5IDI4OC4xMzI4MTIgMzE5LjE5OTIxOSBaIE0gMjg4LjEzMjgxMiAzMTkuMTk5MjE5ICIgc3R5bGU9IiBzdHJva2U6bm9uZTtmaWxsLXJ1bGU6bm9uemVybztmaWxsOnJnYigxMDAlLDQyLjc0NTA5OCUsOC4yMzUyOTQlKTtmaWxsLW9wYWNpdHk6MTsiLz4KPHBhdGggZD0iTSAzNjcuMzk4NDM4IDMzNi4zMzIwMzEgQyAzNjcuMzk4NDM4IDMxMC4zNDM3NSAzNDYuMjUzOTA2IDI4OS4xOTkyMTkgMzIwLjI2NTYyNSAyODkuMTk5MjE5IEwgMTkxLjczNDM3NSAyODkuMTk5MjE5IEMgMTY1Ljc0NjA5NCAyODkuMTk5MjE5IDE0NC42MDE1NjIgMzEwLjM0Mzc1IDE0NC42MDE1NjIgMzM2LjMzMjAzMSBDIDE0NC42MDE1NjIgMzQ4Ljc0MjE4OCAxNDkuNDI5Njg4IDM2MC4wMzkwNjIgMTU3LjI5Njg3NSAzNjguNDY4NzUgQyAxNDkuNDI5Njg4IDM3Ni44OTQ1MzEgMTQ0LjYwMTU2MiAzODguMTkxNDA2IDE0NC42MDE1NjIgNDAwLjYwMTU2MiBDIDE0NC42MDE1NjIgNDI2LjU4OTg0NCAxNjUuNzQ2MDk0IDQ0Ny43MzQzNzUgMTkxLjczNDM3NSA0NDcuNzM0Mzc1IEwgMzIwLjI2OTUzMSA0NDcuNzM0Mzc1IEMgMzQ2LjI1NzgxMiA0NDcuNzM0Mzc1IDM2Ny40MDIzNDQgNDI2LjU4OTg0NCAzNjcuNDAyMzQ0IDQwMC42MDE1NjIgQyAzNjcuNDAyMzQ0IDM4OC4xOTE0MDYgMzYyLjU3NDIxOSAzNzYuODk0NTMxIDM1NC43MDMxMjUgMzY4LjQ2ODc1IEMgMzYyLjU3MDMxMiAzNjAuMDM5MDYyIDM2Ny4zOTg0MzggMzQ4Ljc0MjE4OCAzNjcuMzk4NDM4IDMzNi4zMzIwMzEgWiBNIDM2Ny4zOTg0MzggMzM2LjMzMjAzMSAiIHN0eWxlPSIgc3Ryb2tlOm5vbmU7ZmlsbC1ydWxlOm5vbnplcm87ZmlsbDpyZ2IoNDUuMDk4MDM5JSw3My43MjU0OSUsMTAwJSk7ZmlsbC1vcGFjaXR5OjE7Ii8+CjxwYXRoIGQ9Ik0gMzY3LjM5ODQzOCAzMzYuMzMyMDMxIEMgMzY3LjM5ODQzOCAzMTAuMzQzNzUgMzQ2LjI1MzkwNiAyODkuMTk5MjE5IDMyMC4yNjU2MjUgMjg5LjE5OTIxOSBMIDI1NiAyODkuMTk5MjE5IEwgMjU2IDQ0Ny43MzQzNzUgTCAzMjAuMjY1NjI1IDQ0Ny43MzQzNzUgQyAzNDYuMjUzOTA2IDQ0Ny43MzQzNzUgMzY3LjM5ODQzOCA0MjYuNTg5ODQ0IDM2Ny4zOTg0MzggNDAwLjU5NzY1NiBDIDM2Ny4zOTg0MzggMzg4LjE4NzUgMzYyLjU3MDMxMiAzNzYuODkwNjI1IDM1NC43MDMxMjUgMzY4LjQ2NDg0NCBDIDM2Mi41NzAzMTIgMzYwLjAzOTA2MiAzNjcuMzk4NDM4IDM0OC43NDIxODggMzY3LjM5ODQzOCAzMzYuMzMyMDMxIFogTSAzNjcuMzk4NDM4IDMzNi4zMzIwMzEgIiBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDAlLDU4LjQzMTM3MyUsMTAwJSk7ZmlsbC1vcGFjaXR5OjE7Ii8+CjwvZz4KPC9zdmc+Cg==" />
                            </div>
                            <div class="main ml-3">
                                <h1 style="font-size: 25px" class="m-0 font-weight-light h3">Yeni sifariş</h1>
                                <p style="font-size: 15px" class="mb-1 small">Baxılmamış sifariş ....</p>
                            </div>
                        </div>
                        <div class="action border-left pl-3 d-flex align-items-center">
                            <div>
                                <a class="btn btn-outline-danger btn-block btn-sm delete">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 mb-4 aboutorder" style="background-color: #b1acac;" id="{{$val->id}}">
                    <div class="col-md-5">
                        <span style="font-size:17px"><b>Müştərinin adı:  </b></span><br>
                        <span style="font-size: 15px">{{$val->client_name}}</span><br>

                        <span style="font-size:17px"><b>Müştərinin nömrəsi:  </b></span><br>
                        <span style="font-size: 15px">{{$val->client_phone}}</span><br>

                        <span style="font-size:17px"><b>Müştərinin emaili:  </b></span><br>
                        <span style="font-size: 15px">{{$val->client_email}}</span><br>

                        <span style="font-size:17px"><b>Sifarişin adi:  </b></span><br>
                        <span style="font-size: 15px">{{$val->order_name}}</span><br>

                        <span style="font-size:17px"><b>Sifariş haqqında:  </b></span><br>
                        <span style="font-size: 15px">{{$val->about_order}}</span><br>

                        <span style="font-size:17px"><b>Sifarişin son tarixi:  </b></span><br>
                        <span style="font-size: 15px">{{$val->deadline}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


<script>

    $('.delete').click(function (){
        var div=$(this).closest('div .col-sm-10');
        var id=div.attr('id');
        var ordercount=$('.icon-info .ordercount').text().trim();
        console.log(ordercount)
        $.ajax({
            url:'/seenorder',
            type:'POST',
            data:{
                'id':id,
                "_token":"{{csrf_token()}}"
            },
            success:function (response){
                console.log(response)
                if(response.status=='success'){
                    div.remove();
                }
            }
        })
    })
        $('.active').removeClass('active');
        $('.order_page').addClass('active');
    </script>
@endsection
