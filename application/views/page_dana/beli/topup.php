<div class="beli d-flex justify-content-center pb-0" style="padding: 100px 100px;">
    <form method="post" action="<?php echo site_url('beli/trx_topup')?>">
        <div class="tabs ">
            <input type="radio" name="tabs" id="tabone" checked="checked">
            <label class="label" style="margin-bottom: 0;">Nominal Deposito</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <span>Jumlah Nominal : </span>
                    <input type="number" placeholder="Masukan Nominal Deposit"
                        style="border: 2px solid #dddddd; padding: 5px 10px; width: 100%;" id="fw-nominal"
                        name="fw-nominal" min="50000" required>
                    <div style="color: #d3cbcb;">
                        Nominal terkecil 50.000
                    </div>
                </div>
                <div class="pt-3">
                    <label class="lanjut" for="tabtwo" onclick="return next()">Lanjut</label>
                </div>
            </div>

            <input type="radio" name="tabs" id="tabtwo">
            <label class="label" style="margin-bottom: 0;">Metode Pembayaran</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <span>Transfer Bank</span>
                    <div>
                        <select class="custom-select" id="fw-metode" name="fw-metode" required>
                            <option value="us">BCA (Bank Central Asia)</option>
                        </select>
                    </div>
                    <div style="color: #d3cbcb;">
                        Pilih Bank yang digunakan untuk pembayaran
                    </div>
                </div>
                <div class="d-flex pt-3 pb-5">
                    <div class="pr-3"></div>
                    <div class="d-flex pt-3">
                        <div class="pr-3">
                            <label class="kembali" for="tabone">Kembali</label>
                        </div>
                        <div>
                            <button id="submit" type="submit" class="lanjut">
                                Kirim
                            </button>
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

<div class="modal fade" id="topUP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-header " style="background-color: #089aeb; color: white;">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">
                    <span>Konfirmasi Pembayaran</span>
                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" style="padding: 0 40px; font-size: 15px;">
                <div class="pt-3 d-flex justify-content-between">
                    <div>
                        Total Pembayaran
                    </div>
                    <div>
                        <?php if (isset($nominal_topup)) { 
                        echo "Rp ".number_format($nominal_topup, 0, ',', '.');
                        ?>
                        <input hidden id="nominal_topup" value="<?php echo $nominal_topup; ?>" />
                        <?php } ?>
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
                                5035272639
                            </div>
                        </div>
                    </div>
                    <div>
                        <div style="color: #d8d8d8; font-size: smaller;">
                            Atas Nama
                        </div>
                        <div>
                            PT. Teknologi Selular Pratama
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
                        <?php
                        $name = $this->session->userdata('storename');
                        $id = $this->session->userdata('storeid');
                        $str = 'Halo, saya '.$name.' dengan username '.$id;
                        ?>
                        <a href="https://api.whatsapp.com/send?phone=+6287814001118&text=<?php echo urlencode($str);?>"
                            target="_blank">
                            <span style="border-radius: 5px; background-color: #28d468; padding: 5px 5px;">
                                <i class="fab fa-whatsapp"></i>
                                hubungi admin
                            </span>
                        </a>
                    </div>
                    <div class=" pb-5 d-flex justify-content-between">
                        <input hidden id="time_topup" value="<?php echo $time_topup;?>" />
                        <input hidden id="user_topup" value="<?php echo $this->session->userdata('storeid');?>" />
                        <div style="color: #d8d8d8; font-size: smaller;">
                            konfirmasi pembayaran akan sampai <?php echo $time_topup;?>
                        </div>
                        <div>
                            <a href="<?php echo site_url("home"); ?>" onClick="save_session()"><button
                                    class="lanjut">Oke</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="parent">
    <img class="img-gel" src="<?php echo base_url(); ?>assets_dana/gel.png" alt="">
</div>

<?php if ($flag == true) { ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#topUP').modal({
        backdrop: 'static',
        keyboard: false
    })
    $('#topUP').modal('show');
});
</script>
<?php } else { ?>
<script type="text/javascript">
$(document).ready(function() {
    localStorage.setItem('user_topup', null);
    localStorage.setItem('nominal_topup', null);
    localStorage.setItem('time_topup', null);
});
</script>
<?php } ?>

<script type="text/javascript">
function next() {
    let nomor = $("#fw-nominal").val();
    if (nomor == null || nomor == "") {
        $("#submit").click();
        return false;
    } else {
        return true;
    }
}

function save_session() {
    let nominal_topup = $('#nominal_topup').val();
    let user_topup = $('#user_topup').val();
    let time_topup = $('#time_topup').val();
    localStorage.setItem('nominal_topup', nominal_topup);
    localStorage.setItem('time_topup', time_topup);
    localStorage.setItem('user_topup', user_topup);
}
</script>