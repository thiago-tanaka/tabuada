<template>
    <div>
        <div class="row p-0 m-0">
            <div
                class="col-2 text-center text-success p-0 "
                style="font-size:3em"
            >
                {{ correct_total }}
            </div>
            <div class="col-8 text-center p-0">
                <a href="/">かけ算</a>
            </div>
            <div class="col-2 text-center text-danger p-0" style="font-size:3em">{{ wrong_total }}</div>
        </div>

        <div style="font-size: 2.5em; " class="text-center">
            <span class>{{ number_one }} ÷ {{ number_two }} =</span>
            <input
                v-model="answer"
                class="d-inline text-center form-control p-0"
                :style="'border: solid 3px ' + answerColor"
                style="width: 70px; font-size:0.9em; padding:0px !important;background-color:rgba(0, 0, 0, 0)"
                type="text"
            />
            <div class="d-inline-block" style="width:70px">{{ correctAnswer }}</div>
        </div>
        <div class="text-center">
            <button @click="checkAnswer" class="mt-4 btn btn-success">enviar</button>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            number_one: "",
            number_two: "",
            correctAnswer: null,
            correct_total: 0,
            wrong_total: 0,
            answer: "",
            answerColor: "gray",
            correctAudio: new Audio("correct.mp3"),
            wrongAudio: new Audio("wrong.mp3"),
        };
    },
    mounted() {
        this.getNumbers();
    },
    computed: {},
    methods: {
        aumentar(){
            if(this.tamanho > 600){
                this.tamanho = 200
            }else{
                this.tamanho += 200
            }
        },
        checkAnswer() {
            if (this.answer != "") {
                this.setCorrectAnswer();
                this.setAnswerColor();
                this.increaseTotals();
                this.playAudio();
                self = this;
                setTimeout(function() {
                    self.getNumbers();
                    self.resetAnswerColor();
                    self.answer = "";
                    self.correctAnswer = "";
                }, 2000);
            } else {
                this.answerColor = "red";
            }
        },
        playAudio() {
            if (this.correctAnswer == this.answer) {
                this.correctAudio.play();
            } else {
                this.wrongAudio.play();
            }
        },
        increaseTotals() {
            if (this.correctAnswer == this.answer) {
                this.correct_total++;
            } else {
                this.wrong_total++;
            }
        },
        setAnswerColor() {
            if (this.correctAnswer == this.answer) {
                this.answerColor = "#37ff00";
            } else {
                this.answerColor = "red";
            }
        },
        resetAnswerColor() {
            this.answerColor = "gray";
        },
        setCorrectAnswer() {
            this.correctAnswer = this.number_one / this.number_two;
        },
        getNumbers() {
            var x = true;
            var number_one = Math.floor(Math.random() * (100 - 2 + 1)) + 2;
            var number_two = Math.floor(Math.random() * (100 - 2 + 1)) + 2;
            while (x) {
                var number_one = Math.floor(Math.random() * (100 - 2 + 1)) + 2;
                var number_two = Math.floor(Math.random() * (100 - 2 + 1)) + 2;
                if (number_one > number_two && !(number_one % number_two)) {
                    x = false;
                }
            }
            this.number_one = number_one;
            this.number_two = number_two;
        }
    }
};
</script>
