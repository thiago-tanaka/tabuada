<template>
    <div>
        <div class="row p-0 m-0">
            <div class="col-2 text-center text-success p-0" style="font-size:3em">{{ correct_total }}</div>
            <div class="col-8 text-center p-0"></div>
            <div class="col-2 text-center text-danger p-0" style="font-size:3em">{{ wrong_total }}</div>
        </div>
    
        <div style="font-size: 5em; " class="border text-center">{{ number_one + ' x ' + number_two }}</div>
    
        <table v-if="loop" class="table table-bordered text-center w-100" style="font-size:3em; bottom: 0; left:0; position: absolute">
            <tr v-for="(n, index) in loop" :key="index">
                <td v-for="(o, id) in 3" :key="id" :class="{'bg-success': acertou == numbers['number_' + loop[index][o]], 'bg-danger': errou == numbers['number_' + loop[index][o]]}" :id="numbers['number_' + loop[index][o]]" @click="confere(numbers['number_' + loop[index][o]])">
                    <span v-if="cards != ''">{{ numbers['number_' + loop[index][o]] }}</span>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            loop: {
                'a': { '1': 1, '2': 2, '3': 3 },
                'b': { '1': 4, '2': 5, '3': 6 },
                'c': { '1': 7, '2': 8, '3': 9 },
            },
            cards: [
                '2', '4', '6', '8', '10', '12', '14', '16', '18', '20', '3', '6', '9', '12', '15', '18', '21', '24', '27', '30',
                '4', '8', '12', '16', '20', '24', '28', '32', '36', '40', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50',
                '6', '12', '18', '24', '30', '36', '42', '48', '54', '60', '7', '14', '21', '28', '35', '42', '49', '56', '63', '70',
                '8', '16', '24', '32', '40', '48', '56', '64', '72', '80', '9', '18', '27', '36', '45', '54', '63', '72', '81', '90'
            ],
            number_one: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
            number_two: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
            numbers: {
            },
            correct_total: "0",
            wrong_total: "0",
            already_picked: [],
            acertou: '',
            errou: ''
        };
    },
    props: ["userId"],
    beforeMount() {},
    mounted() {
        this.sortCards();
    },

    methods: {
        debug(o) {
            console.log(o)
        },
        sortCards() {
            this.number_one = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
            this.number_two = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
            this.correct_number = this.number_one * this.number_two;
            this.already_picked = []
            this.already_picked.push(String(this.correct_number));
            console.log(this.already_picked)
            for (let i = 1; i <= 9; i++) {
                do {
                    this.aleatorio = this.cards[Math.floor(Math.random() * 79)];

                } while (this.already_picked.indexOf(this.aleatorio) !== -1);
                this.already_picked.push(this.aleatorio);
                this.numbers['number_' + i] = this.aleatorio;
            }
            this.numbers['number_' + (Math.floor(Math.random() * (9 - 1 + 1)) + 1)] = this.correct_number
        },
        confere(number) {
            this.acertou = this.correct_number
            this.errou = number == this.correct_number ? '' : number
            if (number == this.correct_number) {
                this.correct_total++;
                this.setUserCards(number, true);
            } else {
                this.wrong_total++;
                this.setUserCards(number, false);
            }
            setTimeout(() => {
                this.acertou = ''
                this.errou = ''

                this.sortCards();
            }, 1000);
        },
        setUserCards(number, bool) {
            axios
                .post("/api/cards", {
                    card: number
                })
                .then(response => {
                    if (response.status == 200) {}
                });
        },
    }
};
</script>
