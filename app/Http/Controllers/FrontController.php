<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $jatiyo,$jatiyonewses,$rajniti,$rajnitinewses,$antorjarrtik,$antarjarrtiknewses,
    $kheladhula,$kheladhulanewses,$saradesh,$saradeshnews1,$saradeshnews2,$saradeshnews5,
    $campus,$campusnewses5,$gonomadhym,$gonomaddhonews1,$gonomaddhonews3,$job,$job1,$job3,
    $dhormo,$dhormo1,$dhormo3,$krrishi,$krishi5,$sastho,$sastho1,$sastho3,$ainadalot,$ainadalot1,
    $ainadalot3,$shikkha,$shikkha1,$shikkha3,$sompadokio,$sompadokio5,$binodon,$binodon1,$binodon4,
    $totthoprojukti,$totthoprojukti3,$totthoprojukti4,$motamot,$motamot3,$bussiness,$bussiness3,
    $sharebazar,$sharebazer3,$leadnewses5,$subleadnews2,$fronthome5,$home5newses,$home6newses
    ;
    public $sliders,$videos5;
    public function index()
    {
        $this->jatiyos = Category::where('status', 1)->where('id', 2)->first();
        $this->rajniti = Category::where('status', 1)->where('id', 3)->first();
        $this->antorjarrtik = Category::where('status', 1)->where('id', 5)->first();
        $this->kheladhula= Category::where('status', 1)->where('id', 6)->first();
        $this->saradesh= Category::where('status', 1)->where('id', 9)->first();
        $this->campus= Category::where('status', 1)->where('id', 10)->first();
        $this->gonomadhym= Category::where('status', 1)->where('id', 23)->first();
        $this->job= Category::where('status', 1)->where('id', 11)->first();
        $this->dhormo= Category::where('status', 1)->where('id', 19)->first();
        $this->krrishi= Category::where('status', 1)->where('id', 12)->first();
        $this->sastho=Category::where('status', 1)->where('id', 13)->first();
        $this->ainadalot=Category::where('status', 1)->where('id', 14)->first();
        $this->shikkha=Category::where('status', 1)->where('id', 15)->first();
        $this->sompadokio=Category::where('status', 1)->where('id', 20)->first();
        $this->binodon=Category::where('status', 1)->where('id', 7)->first();
        $this->totthoprojukti=Category::where('status', 1)->where('id', 8)->first();
        $this->motamot=Category::where('status', 1)->where('id', 21)->first();
        $this->bussiness=Category::where('status', 1)->where('id',16)->first();
        $this->sharebazar=Category::where('status', 1)->where('id',17)->first();
        $this->jatiyonewses = Post::where('status', 1)->where('category_id', $this->jatiyos->id ?? null)->latest()          // created_at desc
            ->take(8)->get();

        $this->rajnitinewses = Post::where('status', 1)
            ->where('category_id', $this->rajniti->id ?? null)
            ->latest()          // created_at DESC
            ->take(8)
            ->get();

        $this->antarjarrtiknewses = Post::where('status', 1)
            ->where('category_id', $this->antorjarrtik->id ?? null)
            ->latest()          // created_at DESC
            ->take(8)
            ->get();
        $this->kheladhulanewses = Post::where('status', 1)
            ->where('category_id', $this->kheladhula->id ?? null)
            ->latest()          // created_at DESC
            ->take(8)
            ->get();
        $this->saradeshnews1 = Post::where('status', 1)->where('category_id',$this->saradesh->id)->latest()->first();
        $this->saradeshnews2 = Post::where('status', 1)->where('category_id',$this->saradesh->id)->latest()->skip(1)->take(2)->get();
        $this->saradeshnews5 = Post::where('status', 1)->where('category_id',$this->saradesh->id)->latest()->skip(3)->take(5)->get();
        $this->campusnewses5 = Post::where('status', 1)->where('category_id',$this->campus->id)->latest()->take(5)->get();
        $this->krishi5 = Post::where('status', 1)->where('category_id',$this->krrishi->id)->latest()->take(5)->get();
        $this->gonomaddhonews1 = Post::where('status', 1)->where('category_id',$this->gonomadhym->id)->latest()->first();
        $this->gonomaddhonews3 = Post::where('status', 1)->where('category_id',$this->gonomadhym->id)->latest()->skip(1)->take(3)->get();
        $this->job1 = Post::where('status', 1)->where('category_id',$this->job->id)->latest()->first();
        $this->job3 = Post::where('status', 1)->where('category_id',$this->job->id)->latest()->skip(1)->take(3)->get();
        $this->dhormo1 = Post::where('status', 1)->where('category_id',$this->dhormo->id)->latest()->first();
        $this->dhormo3 = Post::where('status', 1)->where('category_id',$this->dhormo->id)->latest()->skip(1)->take(3)->get();
        $this->sastho1 = Post::where('status', 1)->where('category_id',$this->sastho->id)->latest()->first();
        $this->sastho3 = Post::where('status', 1)->where('category_id',$this->sastho->id)->latest()->skip(1)->take(3)->get();
        $this->ainadalot1 = Post::where('status', 1)->where('category_id',$this->ainadalot->id)->latest()->first();
        $this->ainadalot3 = Post::where('status', 1)->where('category_id',$this->ainadalot->id)->latest()->skip(1)->take(3)->get();
        $this->shikkha1 = Post::where('status', 1)->where('category_id',$this->shikkha->id)->latest()->first();
        $this->shikkha3 = Post::where('status', 1)->where('category_id',$this->shikkha->id)->latest()->skip(1)->take(3)->get();
        $this->sompadokio5 = Post::where('status', 1)->where('category_id',$this->sompadokio->id)->latest()->take(5)->get();
        $this->binodon1 = Post::where('status', 1)->where('category_id',$this->binodon->id)->latest()->first();
        $this->binodon4 = Post::where('status', 1)->where('category_id',$this->binodon->id)->latest()->skip(1)->take(4)->get();
        $this->totthoprojukti3 = Post::where('status', 1)->where('category_id',$this->totthoprojukti->id)->latest()->take(3)->get();
        $this->totthoprojukti4 = Post::where('status', 1)->where('category_id',$this->totthoprojukti->id)->latest()->skip(3)->take(4)->get();
        $this->motamot3 = Post::where('status', 1)->where('category_id',$this->motamot->id)->latest()->take(3)->get();
        $this->bussiness3 = Post::where('status', 1)->where('category_id',$this->bussiness->id)->latest()->take(3)->get();
        $this->sharebazer3= Post::where('status', 1)->where('category_id',$this->sharebazar->id)->latest()->take(3)->get();
        $this->leadnewses5= Post::where('status', 1)->where('lead_news',1)->latest()->take(5)->get();
        $this->subleadnews2= Post::where('status', 1)->where('sublead_news',1)->latest()->take(2)->get();
        $this->home5newses = Post::where('status', 1)->latest()->skip(25)->take(5)->get();
        $this->home6newses = Post::where('status', 1)->latest()->skip(35)->take(6)->get();

        $this->sliders = Slider::latest()->take(8)->get();
        $this->videos5=Video::where('status',1)-> orderBy('id','desc')->take(5)->get();
        return view('front.home.index',[
            'sliders'=>$this->sliders,
            'videos5'=>$this->videos5,
            'jatiyo'=>$this->jatiyos,'jatiyonewses'=>$this->jatiyonewses,
            'rajniti'=>$this->rajniti,'rajnitinewses'=>$this->rajnitinewses,
            'antorjarrtik'=>$this->antorjarrtik,'antarjarrtiknewses'=>$this->antarjarrtiknewses,
            'kheladhula'=>$this->kheladhula, 'kheladhulanewses'=>$this->kheladhulanewses,
            'saradesh'=>$this->saradesh, 'saradeshnews1'=>$this->saradeshnews1,
            'saradeshnews2'=>$this->saradeshnews2, 'saradeshnews5'=>$this->saradeshnews5,
            'campus'=>$this->campus, 'campusnewses5'=>$this->campusnewses5,
            'gonomadhym'=>$this->gonomadhym,'gonomaddhonews1'=>$this->gonomaddhonews1,'gonomaddhonews3'=>$this->gonomaddhonews3,
            'job'=>$this->job,'job1'=>$this->job1,'job3'=>$this->job3,
            'dhormo'=>$this->dhormo,'dhormo1'=>$this->dhormo1,'dhormo3'=>$this->dhormo3,
            'krrishi'=>$this->krrishi,'krrishi5'=>$this->krishi5,
            'sastho'=>$this->sastho,'sastho1'=>$this->sastho1, 'sastho3'=>$this->sastho3,
            'ainadalot'=>$this->ainadalot,'ainadalot1'=>$this->ainadalot1, 'ainadalot3'=>$this->ainadalot3,
            'shikkha'=>$this->shikkha,'shikkha1'=>$this->shikkha1, 'shikkha3'=>$this->shikkha3,
            'sompadokio'=>$this->sompadokio,'sompadokio5'=>$this->sompadokio5,
            'binodon'=>$this->binodon,'binodon1'=>$this->binodon1,'binodon4'=>$this->binodon4,
            'totthoprojukti'=>$this->totthoprojukti,'totthoprojukti3'=>$this->totthoprojukti3,'totthoprojukti4'=>$this->totthoprojukti4,
            'motamot'=>$this->motamot,'motamot3'=>$this->motamot3,'bussiness'=>$this->bussiness,'bussiness3'=>$this->bussiness3,
            'sharebazar'=>$this->sharebazar,'sharebazar3'=>$this->sharebazer3,
            'leadnewses5'=>$this->leadnewses5,'subleadnews2'=>$this->subleadnews2,
            'home5newses'=>$this->home5newses,
            'home6newses'=>$this->home6newses
        ]);
    }
}
