<template>
    <div  class="col-8 text-center p-0 ">
        <div class="row text-center border border-primary bg-dark" >
            <div v-if="current !='multiply'" class="col-6 text-center" onclick="window.open('/', '_self')">
                <a href="/">かけ算</a>
            </div>
            <div v-if="current !='division'" class="col-6 text-center border-primary" :class="{'border-left' : current != 'multiply'}" onclick="window.open('/?division=true', '_self')">
                <a class="text-center" href="/?division=true">わり算</a>
            </div>
            <div v-if="current !='divisionWithRemain'" class="col-6 text-center border-primary border-left" onclick="window.open('/?division2=true', '_self')">
                <a class="text-center" href="/?division2=true">わり算とあまり</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['current']
};
</script>
