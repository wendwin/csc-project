<div x-data>
    <a href="https:/wa.me/62811945045" target="_blank" class="whatsapp_float"
        :class="{
            'hidden': !$store.contact.isVisible,
            'visible': $store.contact.isVisible,
            'mb-wa': $store.contact.isAtBottom
        }">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>


<style>
    .hidden {
        display: none;
    }

    .visible {
        display: block;
    }

    .mb-wa {
        margin-bottom: 50px;
    }

    .whatsapp_float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 20px;
        background-color: #25d366;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        font-size: 35px;
        /* box-shadow: 2px 2px 3px #999; */
        z-index: 100;
    }

    .whatsapp_float:hover {
        background-color: #28b15a;
    }


    @media (min-width: 768px) {

        .whatsapp-icon {
            margin-top: 10px;
        }

        .whatsapp_float {
            width: 60px;
            height: 60px;
            bottom: 70px;
            right: 40px;
            font-size: 35px;
        }

        .mb-wa {
            margin-bottom: 40px;
        }
    }


    @media (min-width: 992px) {

        .whatsapp_float {
            width: 50px;
            height: 50px;
            bottom: 50px;
            font-size: 30px;

        }

        .mb-wa {
            margin-bottom: 50px;
        }
    }
</style>
