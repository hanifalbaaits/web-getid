<div class="beli d-flex justify-content-center" style="padding: 100px 100px;">
    <form action="#">
        <div class="tabs ">
            <input type="radio" name="tabs" id="tabone" checked="checked">
            <label class="label" style="margin-bottom: 0;">Paket Data</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-3">
                    <span>Masukan Nomor Tujuan</span>
                    <input type="number" placeholder="Masukan Nomor Tujuan" required
                        style="border: 2px solid #dddddd; padding: 5px 10px; width: 100%;">
                    <div style="color: #d3cbcb;">
                        Masukan Nomor Tujuan ex: 08790xxxxx
                    </div>
                </div>
                <div class="pt-3">
                    <span>Pilih Paket Data</span>
                    <div>
                        <select class="custom-select" id="inputGroupSelect01" required>
                            <option selected>Pilih Paket Data</option>
                            <option value="1">L</option>
                            <option value="2">P</option>
                        </select>
                    </div>
                    <div style="color: #d3cbcb;">
                        Pilih paket data yang diinginkan
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-3 pb-5">
                    <div>
                        <div>
                            Harga
                        </div>
                        <input type="text" style="border: 2px solid #dddddd; padding: 5px 10px; width: 40%;" readonly>
                    </div>
                    <div style="position: relative;">
                        <div style="visibility: hidden;">
                            |
                        </div>

                        <label class="lanjut" for="tabtwo">Lanjut</label>

                    </div>
                </div>
            </div>

            <input type="radio" name="tabs" id="tabtwo">
            <label class="label" style="margin-bottom: 0;">Konfirmasi Pembayaran</label>
            <div class="tab" style="padding-right: 200px;">
                <div class="pt-5">
                    <div>
                        Total
                    </div>
                    <div class="pt-1">
                        <span style="border: 2px solid #dddddd; padding: 3px 10px; min-width:10px;">
                            RP 5000
                        </span>
                    </div>
                </div>
                <div>
                    <div class="pt-3">
                        <div>
                            Masukan Password
                        </div>
                        <input style="border: #dddddd solid; border-radius: 3px; padding: 0 5px;" id="myInput"
                            type="password" placeholder="masukan password anda" required>
                        <i style="position: relative; left: -30px; color: black; cursor: pointer;"
                            onclick="myFunction(this)" class="fas fa-eye clk"></i>
                        <div class="pt-3" style="color: #d3cbcb;">
                            Masukan Password dengan benar untuk konfirmasi pembayaran
                        </div>
                    </div>
                </div>
                <div class="d-flex pt-3 pb-5">
                    <div class="pr-3">
                        <button type="submit" class="lanjut">
                            Kirim
                        </button>
                    </div>
                    <div>

                        <label class="kembali" for="tabone">Kembali</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="img-right p-5">
        <img style="width: width: 100%;" src="<?php echo base_url(); ?>assets_dana/Group 303@2x.png" alt="">
    </div>
</div>