<div class="beli d-flex justify-content-center pb-0" style="padding: 100px 100px;">
    <form method="post" action="<?php echo site_url('beli/trx_pulsa')?>">
        <div class="tabs ">
            <input type="radio" name="tabs" id="tabone" checked="checked">
            <label class="label" style="margin-bottom: 0;">Pulsa</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-3">
                    <span>Nomor Tujuan: </span>
                    <input type="number" placeholder="Masukan Nomor Tujuan" required
                        style="border: 2px solid #dddddd; padding: 5px 10px; width: 100%;" id="nomor" name="nomor">
                    <div style="color: #d3cbcb;">
                        Masukan Nomor Tujuan ex: 08790xxxxx
                    </div>
                </div>
                <div class="pt-3">
                    <span>Pilih Pulsa :</span>
                    <div>
                        <select class="custom-select" id="pulsa" name="pulsa" required onchange="getHarga(event);">
                            <?php 
                            $harga = null;
                            foreach ($product as $key => $pro) :
                            if (strpos($pro->productname, "DATA") !== false) { continue;
                                } else { 
                                if ($pro->status != "ACTIVE") { continue; }
                                $des = $pro->productname." PULSA ".$pro->amount; 
                            
                                }
                            
                            if ($harga == null) {
                                $harga = "Rp ".number_format($pro->price, 0, ',', '.');
                            }
                            ?>
                            <option value="<?php echo $pro->barcode;?>">
                                <?php echo $des; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="color: #d3cbcb;">
                        Pilih pulsa yang diinginkan
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3 pb-5">
                    <div>
                        <div>
                            Harga
                        </div>
                        <input id="harga" type="text" style="border: 2px solid #dddddd; padding: 5px 10px; width: 60%;"
                            value="<?php echo $harga; ?>" readonly>
                    </div>
                    <div style="position: relative;">
                        <div style="visibility: hidden;">
                            |
                        </div>
                        <label class="lanjut" for="tabtwo" onclick="return next();">Lanjut</label>
                    </div>
                </div>
            </div>

            <input type="radio" name="tabs" id="tabtwo">
            <label class="label" style="margin-bottom: 0;">Konfirmasi Pembayaran</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <div>Total</div>
                    <div class="pt-1">
                        <span id="total"
                            style="border: 2px solid #dddddd; padding: 3px 10px; min-width:10px;"><?php echo $harga; ?></span>
                    </div>
                </div>
                <div>
                    <div class="pt-3">
                        <div>
                            Masukan Password
                        </div>
                        <input style="border: #dddddd solid; border-radius: 3px; padding: 0 5px;" id="password"
                            type="password" placeholder="masukan password anda" required name="sandi">
                        <i style="position: relative; left: -30px; color: black; cursor: pointer;"
                            onclick="myFunction(this)" class="fas fa-eye clk"></i>
                        <div class="pt-3" style="color: #d3cbcb;">
                            Masukan Password dengan benar untuk konfirmasi pembayaran
                        </div>
                    </div>
                </div>
                <div class="d-flex pt-3 pb-5">
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
    </form>
    <div class="img-right p-5">
        <img style="width: 100%;" src="<?php echo base_url(); ?>assets_dana/Group 303@2x.png" alt="">
    </div>
</div>
<div class="parent">
    <img class="img-gel" src="<?php echo base_url(); ?>assets_dana/gel.png" alt="">
</div>
<script type="text/javascript">
function getHarga(e) {
    let no = e.target.value;
    harga = $.ajax({
        data: {
            id: no,
        },
        type: "POST",
        url: "<?php echo site_url('Beli/getHarga');?>",
        async: false
    }).responseText;
    $("#harga").val(harga);
    $("#total").text(harga);
}

function next() {
    let nomor = $("#nomor").val();
    let pulsa = $("#pulsa").val();
    if (nomor == null || pulsa == null ||
        nomor == "" || pulsa == "") {
        $("#submit").click();
        return false;
    } else {
        return true;
    }
}
</script>