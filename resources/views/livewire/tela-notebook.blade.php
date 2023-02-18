<div>
    <section class="container mb-4 mb-md-5 pb-lg-5" id="target-element">


        <div class="row">

            <!-- Comment form -->
            <div class="col-lg-10">
                <div class="border-0 bg-secondary">
                    <div class="mx-auto px-0">
                        <div class="ratio ratio-16x9">
                            <video wire:ignore id="screen-capture-video" autoplay></video>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subscription form + Sharing -->
            <div class="col-lg-2 position-relative">
                <div class="sticky-top " style="top: 70px !important;">

                    <div class="col-lg-12 rounded-3 bg-secondary opacity-90 p-2">
                        <button class="btn btn-sm btn-outline-light w-100" onclick="selecionarTela()">
                            <i class="fa-solid fa-display me-1"></i>
                            Selecionar tela
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>





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
    </script>




</div>
