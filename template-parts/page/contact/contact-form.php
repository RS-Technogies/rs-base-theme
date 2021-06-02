
<section>
    <h4 class="headline margin-bottom-35">Contact Form</h4>

    <div id="contact-message">

    </div>

    <form id="contact-form" class="contactform" name="contact_form" autocomplete="on">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <input name="name" type="text" id="name" placeholder="Your Name" required="required"/>

                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <input name="email" type="email" id="email" placeholder="Email Address"
                           pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                           required="required"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div>
                    <input name="phone" type="tel" id="phone" placeholder="Phone" />
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <input name="subject" type="text" id="subject" placeholder="Subject" required="required"/>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
            <textarea  name="comments" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true"
                      required="required"></textarea>
            </div>
        </div>

        <input type="submit" class="submit button leading-none" id="submit" value="Submit Message"/>
    </form>
</section>