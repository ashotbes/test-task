<!--&lt;!&ndash;<script setup>&ndash;&gt;-->
<!--&lt;!&ndash;import * as XLSX from "xlsx";&ndash;&gt;-->
<!--&lt;!&ndash;import {ref, watch} from "vue";&ndash;&gt;-->

<!--&lt;!&ndash;const products = ref([]);&ndash;&gt;-->
<!--&lt;!&ndash;const totalElements = ref(0);&ndash;&gt;-->
<!--&lt;!&ndash;const fileContent = ref([]);&ndash;&gt;-->

<!--&lt;!&ndash;const handleFileUpload = async (event) => {&ndash;&gt;-->
<!--&lt;!&ndash;    const file = event.target.files[0];&ndash;&gt;-->
<!--&lt;!&ndash;    if (file) {&ndash;&gt;-->
<!--&lt;!&ndash;        await readFile(file);&ndash;&gt;-->
<!--&lt;!&ndash;    }&ndash;&gt;-->
<!--&lt;!&ndash;};&ndash;&gt;-->

<!--&lt;!&ndash;const readFile = async (file) => {&ndash;&gt;-->
<!--&lt;!&ndash;    const reader = new FileReader();&ndash;&gt;-->
<!--&lt;!&ndash;    reader.onload = async (e) => {&ndash;&gt;-->
<!--&lt;!&ndash;        const data = new Uint8Array(e.target.result);&ndash;&gt;-->
<!--&lt;!&ndash;        const workbook = XLSX.read(data, {type: "array"});&ndash;&gt;-->
<!--&lt;!&ndash;        const sheetName = workbook.SheetNames[0];&ndash;&gt;-->
<!--&lt;!&ndash;        const sheet = workbook.Sheets[sheetName];&ndash;&gt;-->
<!--&lt;!&ndash;        const jsonData = XLSX.utils.sheet_to_json(sheet, {header: 1});&ndash;&gt;-->

<!--&lt;!&ndash;        fileContent.value = jsonData;&ndash;&gt;-->
<!--&lt;!&ndash;        products.value = jsonData;&ndash;&gt;-->
<!--&lt;!&ndash;        totalElements.value = jsonData.length;&ndash;&gt;-->

<!--&lt;!&ndash;        await localStorage.setItem("excelData", JSON.stringify(products.value));&ndash;&gt;-->
<!--&lt;!&ndash;    };&ndash;&gt;-->

<!--&lt;!&ndash;    reader.readAsArrayBuffer(file);&ndash;&gt;-->
<!--&lt;!&ndash;};&ndash;&gt;-->

<!--&lt;!&ndash;watch(() => localStorage.getItem("excelData"), (newVal) => {&ndash;&gt;-->
<!--&lt;!&ndash;    const storedData = newVal;&ndash;&gt;-->
<!--&lt;!&ndash;    if (storedData) {&ndash;&gt;-->
<!--&lt;!&ndash;        fileContent.value = JSON.parse(storedData);&ndash;&gt;-->
<!--&lt;!&ndash;    }&ndash;&gt;-->
<!--&lt;!&ndash;});&ndash;&gt;-->
<!--&lt;!&ndash;</script>&ndash;&gt;-->

<!--&lt;!&ndash;<template>&ndash;&gt;-->
<!--&lt;!&ndash;    <div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="custom-file">&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="file" @change="handleFileUpload" class="custom-file-input" id="customFile">&ndash;&gt;-->
<!--&lt;!&ndash;            <label class="custom-file-label" for="customFile">Choose file</label>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div>Total Elements: {{ totalElements }}</div>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->
<!--&lt;!&ndash;    <div class="div-table">&ndash;&gt;-->
<!--&lt;!&ndash;        <table class="table">&ndash;&gt;-->
<!--&lt;!&ndash;            <tbody>&ndash;&gt;-->
<!--&lt;!&ndash;            <tr v-for="product in products" :key="product.id">&ndash;&gt;-->
<!--&lt;!&ndash;                <td>{{ product[0] }}</td>&ndash;&gt;-->
<!--&lt;!&ndash;                <td>{{ product[1] }}</td>&ndash;&gt;-->
<!--&lt;!&ndash;                <td>{{ product[2] }}</td>&ndash;&gt;-->
<!--&lt;!&ndash;                <td>{{ product[3] }}</td>&ndash;&gt;-->
<!--&lt;!&ndash;                <td>{{ product[4] }}</td>&ndash;&gt;-->
<!--&lt;!&ndash;            </tr>&ndash;&gt;-->
<!--&lt;!&ndash;            </tbody>&ndash;&gt;-->
<!--&lt;!&ndash;        </table>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->

<!--&lt;!&ndash;</template>&ndash;&gt;-->

<!--&lt;!&ndash;<style scoped>&ndash;&gt;-->
<!--&lt;!&ndash;.custom-file {&ndash;&gt;-->
<!--&lt;!&ndash;    display: flex;&ndash;&gt;-->
<!--&lt;!&ndash;    justify-content: space-between;&ndash;&gt;-->
<!--&lt;!&ndash;    border: 1px solid grey;&ndash;&gt;-->
<!--&lt;!&ndash;    gap: 15px;&ndash;&gt;-->
<!--&lt;!&ndash;    padding-top: 15px;&ndash;&gt;-->
<!--&lt;!&ndash;    padding-bottom: 15px;&ndash;&gt;-->
<!--&lt;!&ndash;}&ndash;&gt;-->

<!--&lt;!&ndash;.div-table {&ndash;&gt;-->
<!--&lt;!&ndash;    display: flex;&ndash;&gt;-->
<!--&lt;!&ndash;    flex-direction: column;&ndash;&gt;-->
<!--&lt;!&ndash;}&ndash;&gt;-->
<!--&lt;!&ndash;</style>&ndash;&gt;-->

<!--<script setup>-->
<!--import * as XLSX from "xlsx";-->
<!--import { ref, onMounted, watch } from "vue";-->

<!--const products = ref([]);-->
<!--const totalElements = ref(0);-->
<!--const fileContent = ref([]);-->

<!--const handleFileUpload = (event) => {-->
<!--    const file = event.target.files[0];-->
<!--    if (file) {-->
<!--        readFile(file);-->
<!--    }-->
<!--};-->

<!--const readFile = (file) => {-->
<!--    const reader = new FileReader();-->
<!--    reader.onload = (e) => {-->
<!--        const data = new Uint8Array(e.target.result);-->
<!--        const workbook = XLSX.read(data, { type: "array" });-->
<!--        const sheetName = workbook.SheetNames[0];-->
<!--        const sheet = workbook.Sheets[sheetName];-->
<!--        const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });-->

<!--        fileContent.value = jsonData;-->
<!--        products.value = jsonData;-->
<!--        totalElements.value = jsonData.length;-->

<!--        localStorage.setItem("excelData", JSON.stringify(products.value));-->
<!--    };-->
<!--    reader.readAsArrayBuffer(file);-->
<!--};-->

<!--onMounted(() => {-->
<!--    const storedData = localStorage.getItem("excelData");-->
<!--    if (storedData) {-->
<!--        fileContent.value = JSON.parse(storedData);-->
<!--        products.value = JSON.parse(storedData);-->
<!--        totalElements.value = products.value.length;-->
<!--    }-->
<!--});-->

<!--watch(() => localStorage.getItem("excelData"), (newVal) => {-->
<!--    const storedData = newVal;-->
<!--    if (storedData) {-->
<!--        fileContent.value = JSON.parse(storedData);-->
<!--    }-->
<!--});-->

<!--const uploadSecondExcel = async () => {-->
<!--    try {-->
<!--        // Загрузка второго Excel-файла-->
<!--        const fileInput = this.$refs.fileInput;-->
<!--        fileInput.click();-->
<!--    } catch (error) {-->
<!--        console.error('Error uploading second Excel file:', error);-->
<!--    }-->
<!--};-->

<!--</script>-->

<!--<template>-->
<!--    <div>-->
<!--        <div class="custom-file">-->
<!--            <input type="file" @change="handleFileUpload" class="custom-file-input btn btn-primary" id="customFile">-->
<!--            <label class="custom-file-label" for="customFile">Choose file</label>-->
<!--        </div>-->
<!--&lt;!&ndash;        <div>&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="file" @change="handleFileUpload" class="custom-file-input" id="customFile">&ndash;&gt;-->
<!--&lt;!&ndash;            <button @click="uploadSecondExcel">Upload Second Excel</button>&ndash;&gt;-->
<!--&lt;!&ndash;            <label class="custom-file-label" for="customFile">Choose file</label>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--        <div class="p-2 ">-->
<!--            <button class="btn btn-primary" @click="uploadSecondExcel">Upload Second File</button>-->
<!--        </div>-->
<!--        <div>Total Elements: {{ totalElements }}</div>-->
<!--        <div class="div-table">-->
<!--            <table class="table">-->
<!--                <tbody>-->
<!--                <tr v-for="product in products" :key="product.id">-->
<!--                    <td v-for="value in product" :key="product.id">{{ value }}</td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<style scoped>-->
<!--.custom-file {-->
<!--    display: flex;-->
<!--    justify-content: space-between;-->
<!--    border: 1px solid grey;-->
<!--    gap: 15px;-->
<!--    padding-top: 15px;-->
<!--    padding-bottom: 15px;-->
<!--}-->

<!--.div-table {-->
<!--    display: flex;-->
<!--    flex-direction: column;-->
<!--}-->
<!--</style>-->

<script setup>
import * as XLSX from "xlsx";
import { ref, onMounted } from "vue";

const products = ref([]);
const totalElements = ref(0);
const fileContent = ref([]);

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        readFile(file);
    }
};

const readFile = (file) => {
    const reader = new FileReader();
    reader.onload = (e) => {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: "array" });
        const sheetName = workbook.SheetNames[0];
        const sheet = workbook.Sheets[sheetName];
        const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

        fileContent.value = jsonData;
        products.value = jsonData;
        totalElements.value = jsonData.length;

        localStorage.setItem("excelData", JSON.stringify(products.value));
    };
    reader.readAsArrayBuffer(file);
};

onMounted(() => {
    const storedData = localStorage.getItem("excelData");
    if (storedData) {
        fileContent.value = JSON.parse(storedData);
        products.value = JSON.parse(storedData);
        totalElements.value = products.value.length;
    }
});

const uploadSecondExcel = async () => {
    try {
        // Загрузка второго Excel-файла
        const fileInput = document.getElementById("customFile");
        fileInput.click();
    } catch (error) {
        console.error('Error uploading second Excel file:', error);
    }
};
</script>

<template>
    <div>
        <div class="custom-file">
            <input type="file" @change="handleFileUpload" class="custom-file-input btn btn-primary" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div class="p-2 ">
            <button class="btn btn-primary" @click="uploadSecondExcel">Upload Second File</button>
        </div>
        <div>Total Elements: {{ totalElements }}</div>
        <div class="div-table">
            <table class="table">
                <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td v-for="value in product" :key="product.id">{{ value }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.custom-file {
    display: flex;
    justify-content: space-between;
    border: 1px solid grey;
    gap: 15px;
    padding-top: 15px;
    padding-bottom: 15px;
}

.div-table {
    display: flex;
    flex-direction: column;
}
</style>
