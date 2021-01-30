function cetakPola(jmlPola) {

    let str = "";

    let polaGanjilGenap = 0;

    if (jmlPola % 2 === 0) {
        polaGanjilGenap = jmlPola + 3;
        const polaFinal = loop(polaGanjilGenap);
        for (let i = 0; i < jmlPola; i++) {
            str = str.concat(polaFinal);
        }
        console.log(str);
    } else {
        polaGanjilGenap = jmlPola + 2;
        const polaFinal = loop(polaGanjilGenap);
        for (let i = 0; i < jmlPola; i++) {
            str = str.concat(polaFinal);
        }
        console.log(str);
    }

    function loop (jmlPolaGanjilGenap) {
        let str = '';

        const halfNum = jmlPolaGanjilGenap / 2;
        const pembulatan = Math.ceil(halfNum);

        for (let row = 1; row <= jmlPolaGanjilGenap; row++) {
            for (let col = 1; col <= jmlPolaGanjilGenap; col++) {
                if(row <= pembulatan && col >= pembulatan-(row - 1) && col <= pembulatan + (row - 1)){
                    if (row > 1 && col >= pembulatan-(row - 2) && col <= pembulatan + (row - 2)) {
                        str = str.concat(" ")
                    } else {
                        str = str.concat("*")
                    }
                }else if(row >= pembulatan && (col > ((pembulatan - row) * (-1))) && (col <= (jmlPolaGanjilGenap - ((pembulatan - row) * (-1))))){
                    if (row > 1 && (col > ((pembulatan - (row+1)) * (-1))) && (col <= (jmlPolaGanjilGenap - ((pembulatan - (row+1)) * (-1))))) {
                        str = str.concat(" ")
                    } else {
                        str = str.concat("*")
                    }
                }else{
                    str = str.concat(" ");
                }
            }
            str = str.concat("\n");
        }
        return str;
    }
}