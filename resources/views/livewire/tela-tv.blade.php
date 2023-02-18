<div class="my-3">
    <div class="row mx-3" id="conteudo">

        <!-- Comment form -->
        <div class="col-lg-10" id="viewTela">
            <button class="btn btn-sm btn-danger my-3" onclick="exitTela()" id="exitTela" style="display: none; position: absolute; left: 0; z-index: 9999;">
                <i class="fa-solid fa-close me-2"></i>
            </button>
            <div class="border-0  bg-secondary">
                <div class="px-0" id="videoLivewire">
                    @livewire('tela')
                </div>
            </div>

        </div>

        <!-- Subscription form + Sharing -->
        <div class=" position-relative col-lg-2" id="viewTimer">
            <div class="sticky-top" style="top: 70px !important;">

                <!-- Sharing -->
                <div class="row">
                    <div id="secaoTimer">
                        <h2 class="h5 mb-3">
                            <i class="fa-sharp fa-solid fa-calendar me-2"></i>
                            <span class="">
                                {{date('d/m/Y')}}
                            </span>
                        </h2>
                        <div class="display-4">
                            <h1 id="Hora" wire:ignore>
                        </div>
                        <div class="my-4 pb-lg-3" id="timer-section" style="display: none;" wire:ignore>
                            <h2 class="h5 mb-3">
                                <i class="fa-sharp fa-solid fa-clock me-2"></i>
                                <span class="" id="timerInicio">
                                </span>
                            </h2>
                            <h1 class="" wire:ignore id="timer">
                            </h1>
                        </div>
                    </div>

                    <div class="my-4 list-group list-group-flush" id="secaoBotoes">
                        <button class="btn btn-sm my-2 btn-outline-primary" onclick="selecionarTela()" id="btnSelecionarTela">
                            <i class="fa-solid fa-display me-2"></i>
                            Selecionar tela
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-light" onclick="openFullscreen()" id="btnFullScreen">
                            <i class="fa-solid fa-expand me-2"></i>
                            Tela Cheia
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-primary" onclick="pausarTela()" id="btnPausarTela">
                            <i class="fa-solid fa-pause me-2"></i>
                            Pause
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-primary" onclick="startTimer()" id="btnIniciarTimer">
                            <i class="fa-solid fa-play me-2"></i>
                            Iniciar Timer
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-primary" onclick="pararTimer()" id="btnPararTimer">
                            <i class="fa-solid fa-stop me-2"></i>
                            Parar Timer
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-light" onclick="timerFull()" id="btnTimerFull">
                            <i class="fa-solid fa-expand me-2"></i>
                            Relogio Full
                        </button>

                        <button class="btn btn-sm my-2 btn-outline-light" onclick="videoFull()" id="btnVideoFull">
                            <i class="fa-solid fa-expand me-2"></i>
                            Video Full
                        </button>
                    </div>

                    {{--
                    <input type="text" value="{{$timerC->status}}" id="timerStatus" hidden>
                    <input type="text" value="{{$fullscreen->status}}" id="FullStatus" hidden>
                    <input type="text" value="{{$pauseTela->status}}" id="pauseTelaStatus" hidden>
                    --}}
                </div>
            </div>
        </div>
    </div>





    <script wire:ignore>
        //fique observando o vaue do input timerStatus
        var timerStatus = document.getElementById("timerStatus");
        var isStarted = false;

        //fique observando o status do input pauseTelaStatus
        var pauseTelaStatus = document.getElementById("pauseTelaStatus");
        var isPaused = false;

        //fique atualizando o value a cada 0,5segundos
        setInterval(function() {

            if (pauseTelaStatus.value == 'ativo') {
                if (!isPaused) {
                    pausarTela();
                    isPaused = true;
                }
            } else {
                if (isPaused) {
                    startTela();
                    isPaused = false;
                }
            }

            //se o value for igual a 1, mostre o timer
            if (timerStatus.value == 'ativo') {

                if (!isStarted) {
                    startTimer();
                    isStarted = true;
                }
            } else {
                //stopTimer();
                if (isStarted) {
                    //esconde o timer
                    document.getElementById("timer-section").style.display = "none";
                }
                isStarted = false;
            }
        }, 1000);
    </script>

    <script>
        //videoFull, RelogioFull

        var ViewTela = document.getElementById("viewTela");
        var ViewTimer = document.getElementById("viewTimer");
        var ExitTela = document.getElementById("exitTela");
        var videoLivewire = document.getElementById("videoLivewire");
        var secaoTimer = document.getElementById("secaoTimer");
        var secaoBotoes = document.getElementById("secaoBotoes");
        var Hora = document.getElementById("Hora");
        var isTimerFull = false;
        var btnTimerFull = document.getElementById("btnTimerFull");
        var btnVideoFull = document.getElementById("btnVideoFull");
        var btnFullScreen = document.getElementById("btnFullScreen");
        var btnSelecionarTela = document.getElementById("btnSelecionarTela");
        var btnPausarTela = document.getElementById("btnPausarTela");

        function videoFull() {
            ViewTela.classList.remove("col-lg-10");
            ViewTela.classList.add("col-lg-12");
            ViewTimer.style.display = "none";
            ExitTela.style.display = "block";
        }

        function exitTela() {
            ViewTela.classList.remove("col-lg-12");
            ViewTela.classList.add("col-lg-10");
            ViewTimer.style.display = "block";
            ExitTela.style.display = "none";
            ViewTimer.classList.add("col-lg-2");
            ViewTimer.classList.remove("col-lg-12");
            ViewTimer.classList.remove("text-center");
            ViewTela.style.display = "block";
        }

        function timerFull() {

            if (isTimerFull == false) {
                ViewTela.style.display = "none";
                ViewTimer.classList.remove("col-lg-2");
                ViewTimer.classList.add("col-lg-12");
                secaoTimer.classList.add("text-center");
                secaoTimer.classList.add("my-auto");
                secaoTimer.classList.add("col-lg-10");
                secaoBotoes.classList.add("col-lg-2");
                secaoBotoes.classList.add("my-auto");
                secaoTimer.classList.add("text-center");
                Hora.classList.add("display-1");
                btnTimerFull.classList.add("btn-light");
                btnTimerFull.classList.remove("btn-outline-light");
                btnVideoFull.style.display = "none";
                btnSelecionarTela.style.display = "none";
                btnPausarTela.style.display = "none";
                isTimerFull = true;
            } else {
                ViewTela.style.display = "block";
                ViewTimer.classList.add("col-lg-2");
                ViewTimer.classList.remove("col-lg-12");
                secaoTimer.classList.remove("text-center");
                secaoTimer.classList.remove("my-auto");
                secaoTimer.classList.remove("col-lg-10");
                secaoBotoes.classList.remove("col-lg-2");
                secaoBotoes.classList.remove("my-auto");
                secaoTimer.classList.remove("text-center");
                Hora.classList.remove("display-1");
                btnTimerFull.classList.remove("btn-light");
                btnTimerFull.classList.add("btn-outline-light");
                btnVideoFull.style.display = "block";
                btnSelecionarTela.style.display = "block";
                btnPausarTela.style.display = "block";
                isTimerFull = false;
            }


        }
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.showHtml = function(show) {
                let htmlSection = document.getElementById("html-section");
                if (show) {
                    htmlSection.classList.remove("hidden");
                } else {
                    htmlSection.classList.add("hidden");
                }
            }
        });

        //fique atualizando a hora a cada 1 segundo
        setInterval(function() {
            var data = new Date();
            var hora = data.getHours();
            var minuto = data.getMinutes();
            var segundo = data.getSeconds();

            if (hora < 10) {
                hora = "0" + hora;
            }
            if (minuto < 10) {
                minuto = "0" + minuto;
            }
            if (segundo < 10) {
                segundo = "0" + segundo;
            }

            var horaImprimivel = hora + ":" + minuto + ":" + segundo;

            document.getElementById("Hora").innerHTML = horaImprimivel;
        }, 1000);
    </script>



    <script>
        /* Get the documentElement (<html>) to display the page in fullscreen */
        var elem = document.documentElement;

        var isFull = false;

        /* View in fullscreen */
        function openFullscreen() {
            if (isFull) {
                closeFullscreen();
                isFull = false;
            } else {


                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.webkitRequestFullscreen) {
                    /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE11 */
                    elem.msRequestFullscreen();
                }
                isFull = true;
            }


        }

        /* Close fullscreen */
        function closeFullscreen() {
            //adiciona a class container de sect

            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
            }
        }
    </script>

    <script>
        //se a url atual for screen-capture, coloque o header e o footer como display none
        if (window.location.href.indexOf("screen-capture") > -1) {
            document.getElementById("header").style.display = "none";
            document.getElementById("footer").style.display = "none";
        }
    </script>



    <script>
        var isStartTimer = false;

        var timer = document.getElementById("timer");
        var timerInicio = document.getElementById("timerInicio");
        var timerSection = document.getElementById("timer-section");
        var data = new Date();
        var hora = data.getHours();
        var minuto = data.getMinutes();
        var segundo = data.getSeconds();


        function startTimer() {
            if (isStartTimer == false) {

                isStartTimer = true;

                if (hora < 10) {
                    hora = "0" + hora;
                }
                if (minuto < 10) {
                    minuto = "0" + minuto;
                }
                if (segundo < 10) {
                    segundo = "0" + segundo;
                }

                var horaImprimivel = hora + ":" + minuto + ":" + segundo;

                timerInicio.innerHTML = horaImprimivel;
                timerSection.style.display = "block";

                var segundos = 0;
                var minutos = 0;
                var horas = 0;

                var cronometro = setInterval(function() {
                    segundos++;
                    if (segundos == 60) {
                        segundos = 0;
                        minutos++;
                        if (minutos == 60) {
                            minutos = 0;
                            horas++;
                        }
                    }

                    var format = (horas < 10 ? "0" + horas : horas) + ":" + (minutos < 10 ? "0" + minutos : minutos) + ":" +
                        (segundos < 10 ? "0" + segundos : segundos);

                    timer.innerHTML = format;
                    if (isStartTimer == false) {
                        clearInterval(cronometro);
                    }
                }, 1000);



            } else {
                isStartTimer = false;
                //zera o timer
                timer.innerHTML = "00:00:00";
            }
        }

        //faça as funções pause timer, zeraTimer e startTimer

        function pauseTimer() {
            var timer = document.getElementById("timer");
            var timerInicio = document.getElementById("timerInicio");
            var timerSection = document.getElementById("timer-section");
            var data = new Date();
            var hora = data.getHours();
            var minuto = data.getMinutes();
            var segundo = data.getSeconds();

            if (hora < 10) {
                hora = "0" + hora;
            }
            if (minuto < 10) {
                minuto = "0" + minuto;
            }
            if (segundo < 10) {
                segundo = "0" + segundo;
            }

            var horaImprimivel = hora + ":" + minuto + ":" + segundo;

            timerInicio.innerHTML = horaImprimivel;
            timerSection.style.display = "block";

            var segundos = 0;
            var minutos = 0;
            var horas = 0;

            var cronometro = setInterval(function() {
                segundos++;
                if (segundos == 60) {
                    segundos = 0;
                    minutos++;
                    if (minutos == 60) {
                        minutos = 0;
                        horas++;
                    }
                }

                var format = (horas < 10 ? "0" + horas : horas) + ":" + (minutos < 10 ? "0" + minutos : minutos) + ":" +
                    (segundos < 10 ? "0" + segundos : segundos);

                timer.innerHTML = format;
            }, 1000);
        }

        function zeraTimer() {

            if (hora < 10) {
                hora = "0" + hora;
            }
            if (minuto < 10) {
                minuto = "0" + minuto;
            }
            if (segundo < 10) {
                segundo = "0" + segundo;
            }

            var horaImprimivel = hora + ":" + minuto + ":" + segundo;

            timerInicio.innerHTML = horaImprimivel;
            timerSection.style.display = "block";

            var segundos = 0;
            var minutos = 0;
            var horas = 0;

            var cronometro = setInterval(function() {
                segundos++;
                if (segundos == 60) {
                    segundos = 0;
                    minutos++;
                    if (minutos == 60) {
                        minutos = 0;
                        horas++;
                    }
                }

                var format = (horas < 10 ? "0" + horas : horas) + ":" + (minutos < 10 ? "0" + minutos : minutos) + ":" +
                    (segundos < 10 ? "0" + segundos : segundos);

                timer.innerHTML = format;
            }, 1000);
        }
    </script>

    <script>
        function selecionarTela() {
            // Obtenha acesso à tela do usuário
            navigator.mediaDevices.getDisplayMedia({
                    video: true
                })
                .then(function(stream) {
                    // Obtenha a tag de vídeo e atribua o fluxo a ela
                    var video = document.getElementById('screen-capture-video');
                    video.srcObject = stream;
                })
                .catch(function(error) {
                    console.error(error);
                });

        }

        function pausarTela() {
            //pause o video
            var video = document.getElementById('screen-capture-video');
            //se o video estiver pausado, execute o play
            if (video.paused) {
                video.play();
            } else {
                //se o video estiver tocando, execute o pause
                video.pause();
            }
        }
    </script>


</div>
