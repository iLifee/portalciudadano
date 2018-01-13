<template>
    <div>
        <div v-for="item in reports">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="">{{item.titulo}}<small class="pull-right">{{item.created_at}}</small></h3>
                    <div class="postText">
                        <p>{{item.contenido}}</p>
                    </div>
                    <div class="postAuthor">
                        <h4>{{item.autor}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.getReports();
        },
        methods: {
            getReports: function () {
                 let urlReports = 'Reporte';
                 axios.get(urlReports).then(response => {
                     console.log(response);
                     this.reports = response.data;
                     for (var i = this.reports.length - 1; i >= 0; i--) {
                         this.reports[i].created_at = humanized_time_span(this.reports[i].created_at);
                     }
                 });
            },
            getTimeSince(date){
                
            }
        },
        data: function () {
            return {
                reports: []
            }
        }
    }
</script>