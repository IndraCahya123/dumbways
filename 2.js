function hitungHurufDariKalimat(huruf, jmlKalimat) {
    this.huruf = huruf;
    this.jmlKalimat = jmlKalimat;

    let jmlHuruf = "";
    const toArr = this.jmlKalimat.split("");

    const filterKalimat = toArr.filter(huruf => huruf === this.huruf);

    if (filterKalimat === []) {
        console.log("Huruf tidak terdapat dalam kalimat!");
    } else {
        for (let i = 0; i < filterKalimat.length; i++) {
            jmlHuruf = jmlHuruf.concat(this.huruf + "\n");
        }

        console.log(
            jmlHuruf + "\n" +
            `Jumlah Huruf : ${filterKalimat.length}`
            );
    }
}

