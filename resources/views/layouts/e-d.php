
<style>
    .modal-3d .modal-dialog {
            max-width: 80vw;
            max-height:80vh;
            margin:0 auto;
        }
/*.3dmodal .modal-header{border-bottom:1px solid #657a93!important;}*/
        /* Make the modal body fill the modal content area */
        

        /*#3dmodal .modal-body {*/
        /*    padding: 0; */
        /*    max-height: 80vh;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*}*/

        /* Make model-viewer fill the modal body */
        model-viewer {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            display: block;
            
        }
        /*.3dmodal .btn-close {filter: invert(1);}*/
</style>

<div class="modal fade modal-3d" id="3dModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style=" height: 80vh;">
      <div class="modal-header" style="background-color: #465970;border-bottom:1px solid #657a93!important;">
        <!--<h2 class="main_head text-white fs-5 m-0 text-left text-md-center" id="exampleModalLabel">Single Expansion Joint</h2>-->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
      </div>
      <div class="modal-body" >
    <!-- Load model-viewer script -->
                    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
                    <model-viewer
                        src=""
                        alt="3D model of a single expansion joint"
                        reveal="auto"
                        loading="lazy"
                        auto-rotate
                        shadow-intensity="1"
                        camera-controls ="pan-x pan-y"
                        touch-action="none"
                        exposure="0.8"
                        disable-zoom
                        disable-tap
                        interaction-policy="always-allow"
                        camera-orbit="0deg 90deg 100%"
                        >
                                              
                    </model-viewer>
      </div>
    </div>
  </div>
</div>


