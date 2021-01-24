<div class="beli d-flex justify-content-center" style="padding: 100px 100px;">
    <form action="#">
        <div class="tabs ">
            <input type="radio" name="tabs" id="tabone" checked="checked">
            <label class="label" style="margin-bottom: 0;">Pulsa</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <span>Masukan Jumlah Nominal</span>
                    <input type="number" placeholder="Rp 50.000"
                        style="border: 2px solid #dddddd; padding: 5px 10px; width: 100%;" required>
                    <div style="color: #d3cbcb;">
                        Minimum Rp 50.000
                    </div>
                </div>
                <div class="pt-3">
                    <label class="lanjut" for="tabtwo">Lanjut</label>
                </div>
            </div>

            <input type="radio" name="tabs" id="tabtwo">
            <label class="label" style="margin-bottom: 0;">Konfirmasi Pembayaran</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <span>Transfer Bank</span>
                    <div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Pilih Bank</option>
                            <option value="1">L</option>
                            <option value="2">P</option>
                        </select>
                    </div>
                    <div style="color: #d3cbcb;">
                        Pilih Bank yang digunakan untuk pembayaran
                    </div>
                </div>
                <div class="d-flex pt-3 pb-5">
                    <div class="pr-3">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="border: none;">
                                    <div class="modal-header " style="background-color: #089aeb; color: white;">
                                        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">
                                            <span>
                                                Konfiramasi
                                                Pembayaran
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="padding: 0 40px; font-size: 15px;">
                                        <div class="pt-3 d-flex justify-content-between">
                                            <div>
                                                Total Pembayaran
                                            </div>
                                            <div>
                                                Rp 5000
                                            </div>
                                        </div>
                                        <div>
                                            <hr style="border: solid #d8d8d8 1px;">
                                        </div>
                                        <div>
                                            <div>
                                                Silahkan melakukan pembayaran ke nomor rekening berikut :
                                            </div>
                                            <div class="pt-3 d-flex justify-content-between">
                                                <div>
                                                    <div style="color: #d8d8d8; font-size: smaller;">
                                                        Nama Bank
                                                    </div>
                                                    <div>
                                                        BCA (Bank Centra Asia)
                                                    </div>
                                                </div>
                                                <div>
                                                    <div style="color: #d8d8d8; font-size: smaller;">
                                                        No Rekening
                                                    </div>
                                                    <div>
                                                        4990336889
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div style="color: #d8d8d8; font-size: smaller;">
                                                    Atas Nama
                                                </div>
                                                <div>
                                                    PT atas perseto
                                                </div>
                                            </div>
                                            <div>
                                                <hr style="border: solid #d8d8d8 1px;">
                                            </div>
                                            <div>
                                                Pastikan Jumlah <b>3 digit terakhir</b> benar. <br>
                                                Setelah melakukan pembayaran harap konfirmasi ke:
                                            </div>
                                            <div class="pt-3 pb-5">
                                                <a href="#">
                                                    <span
                                                        style="border-radius: 5px; background-color: #28d468; padding: 5px 5px;">
                                                        <i class="fab fa-whatsapp"></i>
                                                        hubungi admin
                                                    </span>
                                                </a>
                                            </div>
                                            <div class=" pb-5 d-flex justify-content-between">
                                                <div style="color: #d8d8d8; font-size: smaller;">
                                                    konfirmasi pembayaran akan sampai 2021-01-10
                                                </div>
                                                <div>
                                                    <button type="button" class="lanjut">
                                                        Oke
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex pt-3">
                        <div class="pr-3">
                            <button type="submit" class="lanjut" data-toggle="modal" data-target="#exampleModal">
                                Kirim
                            </button>
                        </div>
                        <div>
                            <label class="kembali" for="tabone">Kembali</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="img-right p-5">
        <img style="width: 100%;" src="<?php echo base_url(); ?>assets_dana/Group 303@2x.png" alt="">
    </div>
</div>