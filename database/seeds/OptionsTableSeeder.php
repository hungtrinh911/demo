<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=== Thông tin hệ thống (Không hiển thị/sửa đổi trên form) ===*/
        // Danh sách ngôn ngữ
        $option = new Option();
        $option->key = 'locale_list';
        $option->value = '[{"locale":"vi","name":"Tiếng Việt","flag":"/backend/assets/images/flag_vi.png"},{"locale":"en","name":"English","flag":"/backend/assets/images/flag_en.png"}]';
        $option->group = 'system';
        $option->description = 'Danh sách ngôn ngữ hỗ trợ';
        $option->save();

        // Ngôn ngữ mặc định
        $option = new Option();
        $option->key = 'locale_default';
        $option->value = 'vi';
        $option->group = 'system';
        $option->description = 'Mã ngôn ngữ mặc định';
        $option->save();

        /*=== Thông tin về SITE ===*/
        $option = new Option();
        $option->key = 'site_name';
        $option->value = 'tieng viet';
        $option->group = 'site';
        $option->locale = 'vi';
        $option->description = 'Tên website/ứng dụng';
        $option->save();

        $option = new Option();
        $option->key = 'site_name';
        $option->value = 'Live Real';
        $option->group = 'site';
        $option->locale = 'en';
        $option->description = 'Tên website/ứng dụng';
        $option->save();

        $option = new Option();
        $option->key = 'site_url';
        $option->value = 'http://lr.seekill.com';
        $option->group = 'site';
        $option->description = 'Domain website/ứng dụng';
        $option->save();

        $option = new Option();
        $option->key = 'site_icon';
        $option->value = '/upload/logo/logo1.png';
        $option->group = 'site';
        $option->description = 'Biểu tượng trên trình duyệt của website';
        $option->save();
        /*guide_profile*/
        $option = new Option();
        $option->key = 'site_logos';
        $option->value = '["fontend/images/sl-profile-1.jpg","fontend/images/sl-profile-2.jpg","fontend/images/sl-profile-3.jpg"]';
        $option->group = 'site';
        $option->description = 'Danh sách ảnh logo của site. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_guide_profile';
        $option->value = '["fontend/images/bg-profile.jpg","Connecting the hundred of tour guides in the country","Making the contract and having no any additional charges to the customer","Supporting to search the professional tour guides","Caring the customer 24/7"]';
        $option->group = 'site';
        $option->locale='en';
        $option->description = 'Danh sách guideprofile site. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_guide_profile';
        $option->value = '["fontend/images/bg-profile.jpg","Connecting the hundred of tour guides in the country","Making the contract and having no any additional charges to the customer","Supporting to search the professional tour guides","Caring the customer 24/7"]';
        $option->group = 'site';
        $option->locale='vi';
        $option->description = 'Danh sách guideprofile site. Dữ liệu lưu theo json';
        $option->save();


        /*slide top*/

        $option = new Option();
        $option->key = 'site_slide';
        $option->value = '[{"image":"fontend/images/slider.jpg","title":"why not ????","content":"With over 10 years of experience helping businesses to find comprehensive solutions","name":"slide_top_1"},{"image":"fontend/images/slider.jpg","title":"COMPANY TOUR GUIDE","content":"For the company searching the tour guides suit the large members","name":"slide_top_2"},{"image":"fontend/images/slider.jpg","title":"sao lai khong doi dc...","content":"With over 10 years of experience helping businesses to find comprehensive solutions","name":"slide_top_3"}]';
        $option->group = 'site';
        $option->locale ='en';
        $option->description = 'Danh sách ảnh slide top của site. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_slide';
        $option->value = '[{"image":"fontend/images/slider.jpg","title":"sao lai khong doi dc...","content":"With over 10 years of experience helping businesses to find comprehensive solutions","name":"slide_top_1"},{"image":"fontend/images/slider.jpg","title":"COMPANY TOUR GUIDE","content":"For the company searching the tour guides suit the large members","name":"slide_top_2"},{"image":"fontend/images/slider.jpg","title":"sao lai khong doi dc...","content":"With over 10 years of experience helping businesses to find comprehensive solutions","name":"slide_top_3"}]';
        $option->group = 'site';
        $option->locale ='vi';
        $option->description = 'Danh sách ảnh slide top của site. Dữ liệu lưu theo json';
        $option->save();


        /* PRIVATE TOUR GUIDE + Company tour guide*/
        $option = new Option();
        $option->key = 'site_tourguide';
        $option->value = '[{"image":"fontend/images/ico-customer.png","title":"PRIVATE TOUR GUIDE","content":"For the customers searching the tour guides suit privately"},{"image":"fontend/images/ico-company.png","title":"COMPANY TOUR GUIDE","content":"For the company searching the tour guides suit the large members"}]';
        $option->group = 'site';
        $option->locale = 'en';
        $option->description = 'PRIVATE TOUR GUIDE + Company tour guide. Dữ liệu lưu theo json';
        $option->save();

                $option = new Option();
        $option->key = 'site_tourguide';
        $option->value = '[{"image":"fontend/images/ico-customer.png","title":"PRIVATE TOUR GUIDE","content":"For the customers searching the tour guides suit privately"},{"image":"fontend/images/ico-company.png","title":"COMPANY TOUR GUIDE","content":"For the company searching the tour guides suit the large members"}]';
        $option->group = 'site';
        $option->locale = 'vi';
        $option->description = 'PRIVATE TOUR GUIDE + Company tour guide. Dữ liệu lưu theo json';
        $option->save();

        /*training course*/

        $option = new Option();
        $option->key = 'site_training_course';
        $option->value = '[{"title":"Tourism skills","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."},{"title":"Hotel skills","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."},{"title":"Foreign language skills" ,"content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."}]';
        $option->group = 'site';
        $option->locale = 'en';
        $option->description = 'site_training_courses. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_training_course';
        $option->value = '[{"title":"Kĩ năng tổ chức","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."},{"title":"kĩ năng đặt phòng","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."},{"title":"khả năng ngoại ngữ" ,"content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim voluptatem."}]';
        $option->group = 'site';
        $option->locale = 'vi';
        $option->description = 'site_training_courses. Dữ liệu lưu theo json';
        $option->save();


        $option = new Option();
        $option->key = 'site_training_course_image';
        $option->value ='["fontend/image/img-course.jpg","bg-course.jpg"]';
        $option->group = 'site';
        $option->locale = 'en';
        $option->description = 'ảnh site_training_courses. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_training_course_image';
        $option->value = '["fontend/image/img-course.jpg","bg-course.jpg"]';
        $option->group = 'site';
        $option->locale = 'vi';
        $option->description = 'ảnh site_training_courses. Dữ liệu lưu theo json';
        $option->save();

        /*Job Search*/

        $option = new Option();
        $option->key = 'site_job_search';
        $option->value = '[{"title":"Job Opportunity Search","description":"Recruitment","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat." ,"image":"fontend/image/banner-01.jpg"}]';
        $option->group = 'site';
        $option->locale = 'en';
        $option->description = 'Job search. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_job_search';
        $option->value = '[{"title":"Job Opportunity Search","description":"Recruitment","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.","image":"fontend/image/banner-01.jpg"}]';
        $option->group = 'site';
        $option->locale = 'vi';
        $option->description = 'Job search. Dữ liệu lưu theo json';
        $option->save();


        /*faqs*/
        $option = new Option();
        $option->key = 'site_faqs';
        $option->value = '[{"title":"Want to cooperate with you, what do I do?","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."},{"title":"I would like a quotation, can you help me?","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."},{"title":"Industrial classification of economic activities?","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."}]';
        $option->group = 'update';
        $option->locale = 'en';
        $option->description = 'faqs. Dữ liệu lưu theo json';
        $option->save();


        $option = new Option();
        $option->key = 'site_faqs';
        $option->value = '[{"title":"Want to cooperate with you, what do I do?","content":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."},{"title":"I would like a quotation, can you help me?","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."},{"title":"Industrial classification of economic activities?","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."}]';
        $option->group = 'update';
        $option->locale = 'vi';
        $option->description = 'faqs. Dữ liệu lưu theo json';
        $option->save();
        /*about us*/
        $option = new Option();
        $option->key = 'site_about_us';
        $option->value = '[{"title":"ABOUT US","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."}]';
        $option->group = 'site';
        $option->locale='en';
        $option->description = 'about us. Dữ liệu lưu theo json';
        $option->save();

                $option = new Option();
        $option->key = 'site_about_us';
        $option->value = '[{"title":"ABOUT US","content":"A business, also known as an enterprise, agency, or a firm, is anentity involved in the provision of goods, services, or both to consumers. Businesses are prevalent in capitalist economies."}]';
        $option->group = 'site';
        $option->locale='vi';
        $option->description = 'about us. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_contact_us';
        $option->value = '["Why guidereview?","A business, also known as an enterprise, agency or a firm, is an entity involved in the provision of goods or services to consumers. Businesses are prevalent incapitalist economies, where most of them are privately.","Agriculture and mining businesses produce raw material","Organization and government regulation","Organization and government regulation"]';
        $option->group = 'site';
        $option->locale='vi';
        $option->description = 'contact us. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_contact_us';
        $option->value =  '["Why guidereview?","A business, also known as an enterprise, agency or a firm, is an entity involved in the provision of goods or services to consumers. Businesses are prevalent incapitalist economies, where most of them are privately.","Agriculture and mining businesses produce raw material","Organization and government regulation","Organization and government regulation"]';
        $option->group = 'site';
        $option->locale='en';
        $option->description = 'contact us. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_number';
        $option->value = '[{"number":"50" ,"word":"Hard Worker"},{"number":"200" ,"word":"Happy Customer"},{"number":"100" ,"word":"Projects Complete"}]';
        $option->group = 'site';
        $option->locale='en';
        $option->description = 'Các con số';
        $option->save();

        $option = new Option();
        $option->key = 'site_number';
        $option->value = '[{"number":"50" ,"word":"Hard Worker"},{"number":"200" ,"word":"Happy Customer"},{"number":"100" ,"word":"Projects Complete"}]';
        $option->group = 'site';
        $option->locale='vi';
        $option->description = 'Các con số';
        $option->save();

/*Basic*/
        $option = new Option();
        $option->key = 'site_copyright';
        $option->value = '© Copyright LIVE REAL 2018';
        $option->group = 'site';
        $option->description = 'Dòng thông tin copyright';
        $option->save();

        $option = new Option();
        $option->key = 'site_address';
        $option->value = 'Keangnam - Ha Noi';
        $option->group = 'site';
        $option->description = 'Địa chỉ chính.';
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'site_address';
        $option->value = 'Keangnam - Ha Noi';
        $option->group = 'site';
        $option->description = 'Địa chỉ chính.';
        $option->locale = 'en';
        $option->save();

        $option = new Option();
        $option->key = 'site_hotline';
        $option->value = '(+84) 123 456 789';
        $option->group = 'site';
        $option->description = 'Số điện thoại hotline';
        $option->save();

        $option = new Option();
        $option->key = 'site_telephone';
        $option->value = '(+84) 123 456 789';
        $option->group = 'site';
        $option->description = 'Số điện thoại văn phòng';
        $option->save();

        $option = new Option();
        $option->key = 'site_email';
        $option->value = 'hello@guidereview.com';
        $option->group = 'site';
        $option->description = 'Địa chỉ email';
        $option->save();

        /* SEO */
        $option = new Option();
        $option->key = 'site_title';
        $option->value = 'Guide review asia';
        $option->group = 'site';
        $option->description = 'Tiêu đề mặc định';
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'site_title';
        $option->value = 'Guide review asia';
        $option->group = 'site';
        $option->description = 'Tiêu đề mặc định';
        $option->locale = 'en';
        $option->save();

        $option = new Option();
        $option->key = 'site_description';
        $option->value = 'Do not worry about tourism, guidereview.asia will help you not miss any great things in your travel. We choose the hotel suitable, special tours, detailed travel information with attractive prices.';
        $option->group = 'site';
        $option->description = 'Mô tả ngắn gọn về site';
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'site_description';
        $option->value = 'Do not worry about tourism, guidereview.asia will help you not miss any great things in your travel. We choose the hotel suitable, special tours, detailed travel information with attractive prices.';
        $option->group = 'site';
        $option->description = 'Mô tả ngắn gọn về site';
        $option->locale = 'en';
        $option->save();

        $option = new Option();
        $option->key = 'site_keywords';
        $option->value = '["live real","b\u1ea5t \u0111\u1ed9ng s\u1ea3n","118 v\u0169 t\u00f4ng phan"]';
        $option->group = 'site';
        $option->description = 'Danh sách từ khóa mặc định của site.';
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'site_keywords';
        $option->value = '["live real","b\u1ea5t \u0111\u1ed9ng s\u1ea3n","118 v\u0169 t\u00f4ng phan"]';
        $option->group = 'site';
        $option->description = 'Danh sách từ khóa mặc định của site.';
        $option->locale = 'en';
        $option->save();

        $option = new Option();
        $option->key = 'site_image';
        $option->value = '/upload/slide-1.jpg';
        $option->group = 'site';
        $option->description = 'Ảnh mặc định của website';
        $option->save();

        $option = new Option();
        $option->key = 'gg_analytics_tracking_id';
        $option->value = '';
        $option->group = 'seo';
        $option->description = 'TrackingID của Google Analytics';
        $option->save();

        /* Social Networks */
        $option = new Option();
        $option->key = 'fb_app_id';
        $option->value = '784212385010419';
        $option->group = 'seo';
        $option->description = 'ID App của FB';
        $option->save();

        $option = new Option();
        $option->key = 'fb_page_link';
        $option->value = 'https://www.facebook.com/bannhahanoidvg/';
        $option->group = 'seo';
        $option->description = 'Đường dẫn page facebook';
        $option->save();
    }
}
