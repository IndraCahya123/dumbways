function hitungKreditRumah(jenisRumah, lamaKredit){

    class DataAngsuran{
        constructor(bulan, angsuran, sisa){
            this.bulan = bulan;
            this.angsuran = angsuran;
            this.sisa = sisa;
        }


    }

    let hargaRumah, uangMuka, sisaJumlahKredit, angsuran;

    if (jenisRumah == "Rose") {
        hargaRumah = 120000000;

        keterangan("Rose", hargaRumah, lamaKredit);

        console.table(buatDataAngsuran(hargaRumah, lamaKredit));
    } else if(jenisRumah == "Gold") {
        hargaRumah = 300000000;

        keterangan("Gold", hargaRumah, lamaKredit);

        console.table(buatDataAngsuran(hargaRumah, lamaKredit));
    } else if(jenisRumah == "Platinum") {
        hargaRumah = 360000000;

        keterangan("Platinum", hargaRumah, lamaKredit);

        console.table(buatDataAngsuran(hargaRumah, lamaKredit));
    } else {
        console.log("Jenis rumah belum terdaftar")
    }

    function buatDataAngsuran(hargaRumah, lamaKredit) {
        let tabelKredit = [];

        uangMuka = 0.2 * hargaRumah;
        sisaJumlahKredit = hargaRumah - uangMuka;
        angsuran = sisaJumlahKredit / lamaKredit;

        for (let lamaAngsuran = 1; lamaAngsuran <= lamaKredit; lamaAngsuran++) {
            const dataKredit = new DataAngsuran(lamaAngsuran, angsuran, sisaJumlahKredit-=angsuran);                
            tabelKredit.push(dataKredit);
        }

        return tabelKredit;
    }

    function keterangan(jenisRumah, hargaRumah, lamaKredit) {
        uangMuka = 0.2 * hargaRumah;
        sisaJumlahKredit = hargaRumah - uangMuka;
        angsuran = sisaJumlahKredit / lamaKredit;

        console.log(`
            Type Rumah: ${jenisRumah} \n
            Harga Rumah: ${hargaRumah} \n
            Uang Muka: ${uangMuka} \n
            Sisa: ${sisaJumlahKredit} \n
            Lama Kredit: ${lamaKredit} \n
            Angsuran: ${angsuran} \n\n
        `);
    }
}