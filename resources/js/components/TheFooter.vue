<template>
    <div class="section-footer">
        <div class="container pt-4">
            <div class="row">
                <div class="col-xs-12 col-md-4 pb-4">
                    <div class="col-footer">
                        <ul>
                            <li><h4>Scopri Deliverboo</h4></li>
                            <li v-for=" (link, i) in linksFooter.deliverboo" :key="i">
                                <a :href=" link.href ">{{ link.link }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 pb-4">
                    <div class="col-footer">
                        <ul>
                            <li><h4>Note legali</h4></li>
                            <li v-for="(link, i) in linksFooter.notes" :key="i">
                                <a :href=" link.href ">{{ link.link }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 pb-4">
                    <div class="col-footer">
                        <ul>
                            <li><h4>Contatti</h4></li>
                            <li v-for="(link, i) in linksFooter.contacts" :key="i">
                                <span>{{ link.name }}</span>
                                <a :href="link.git"><i :class="link.iconGit"></i></a>
                                <a :href="link.linkedin"><i :class="link.iconLinkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col d-flex justify-content-between">
                    <ul class="social d-flex">
                        <li v-for="(link, i) in linksFooter.social" :key="i">
                            <a :href="link.href">
                                <i :class="link.icon"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="copyright">
                        <p>© 2022 Deliverboo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "TheFooter",
    data() {
        return {
            linksFooter: {

                deliverboo: [
                    {
                        link: "Investitori",
                        href: "https://corporate.deliveroo.co.uk/",
                    },
                    {
                        link: "Chi Siamo",
                        href: "https://deliveroo.it/it/about-us",
                    },
                    {
                        link: "Ristoranti",
                        href: "https://deliveroo.it/it/takeaway/",
                    },
                    {
                        link: "Altro",
                        href: "https://deliveroo.it/it/more/",
                    },
                    {
                        link: "Pressroom",
                        href: "https://it.deliveroo.news/",
                    },
                    {
                        link: "Programmazione",
                        href: "https://deliveroo.engineering/",
                    },
                    {
                        link: "Design",
                        href: "https://www.deliveroo.design/",
                    },
                    {
                        link: "Lavora con noi",
                        href: "https://www.deliveroo.design/",
                    },
                    {
                        link: "Diventa nostro partner",
                        href: "https://restaurants.deliveroo.com/it-it/"
                    },
                ],
                notes: [
                    {
                        link: "Termini & Condizioni",
                        href: "https://deliveroo.it/it/legal",
                    },
                    {
                        link: "Informativa sulla privacy",
                        href: "https://deliveroo.it/it/privacy",
                    },
                    {
                        link: "Cookies",
                        href: "https://deliveroo.it/it/cookies"
                    },
                ],
                contacts: [
                    {
                        name: "Paolo Pugliese",
                        git: "https://github.com/paolopu91",
                        iconGit: "fa-brands fa-github",
                        linkedin: "https://www.linkedin.com/in/paolo-pugliese-a3027a171/",
                        iconLinkedin: "fa-brands fa-linkedin"
                    },
                    {
                        name: "Stefano Saccocci",
                        git: "https://github.com/StefanoSax93",
                        iconGit: "fa-brands fa-github",
                        linkedin: "https://www.linkedin.com/in/stefano-saccocci-a67164200/",
                        iconLinkedin: "fa-brands fa-linkedin"
                    },
                    {
                        name: "Debora De Felice",
                        git: "https://github.com/Debby95",
                        iconGit: "fa-brands fa-github",
                        linkedin: "https://www.linkedin.com/in/debora-de-felice-0349a3186/",
                        iconLinkedin: "fa-brands fa-linkedin"
                    },
                    {
                        name: "Anna Tassone",
                        git: "",
                        iconGit: "fa-brands fa-github",
                        linkedin: "",
                        iconLinkedin: "fa-brands fa-linkedin"
                    },
                ],
                social: [
                    {
                        href: "https://www.facebook.com/DeliverooIT",
                        icon: "fa-brands fa-facebook",
                    },
                    {
                        href: "https://twitter.com/deliveroo_italy",
                        icon: "fa-brands fa-twitter",
                    },
                    {
                        href: "https://www.instagram.com/deliveroo_italy/",
                        icon: "fa-brands fa-instagram"
                    }
                ]
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";    
.section-footer {
    background: rgb(46, 51, 51);

    .col-footer {
        background: rgb(67, 72, 72);
        padding: .9375rem 0;
        height: 100%;

        li {
            list-style: none;
            padding-bottom: .4375rem;

            h4 {
                color: $color-light;
                font-size: 1.125rem;
                font-weight: 700;
            }

            a, 
            span {
                text-decoration: none;
                color: $color-light;
                font-size: .875rem;
                cursor: pointer;
            }

            a:hover,
            span:hover {
                color: rgb(0, 204, 188);
            }

            .fa-github {
                padding: 0 .625rem;
            }
        }
    }
    .social {
        color: $color-light;
        padding-left: 0rem;

        li {
            list-style: none;
        }

        i {
            padding-right: .8125rem;
            font-size: 1.25rem;
            color: $color-light;

            &:hover {
                color: rgb(0, 204, 188);
            }
        }
    }
    .copyright {
        color: rgb(67, 72, 72);
    }
}
</style>