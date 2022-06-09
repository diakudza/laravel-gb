<template>

    <div>

        <h1>Main Admin Page</h1>

    </div>

</template>
<script>

import LayoutAdmin from "../../Share/LayoutAdmin";

export default {
    components:
        {
           LayoutAdmin
        },
    props: ['randNews', 'lastFeedbacks', 'title'],
    Layout: LayoutAdmin,
    data() {
        return {}
    },

}
</script>
