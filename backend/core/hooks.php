<?php





function get_Header(){

    return doAction("getHeader");
}

function get_Footer(){
    return doAction("getFooter");
}

function getDir(){

    return doAction("getDir");
}

function includeScript($ScriptName, $From = null){
    return doAction("includeScript", $ScriptName, $From);
}

function get_Head(){
    return doAction("getHead");
}

function get_View(){
    return doAction("getView");
}

function getSiteName(){
    return doAction("getSiteName");
}

function getUserName(){
    return doAction("getUserName");
}

function get_Title(){
    return doAction("getTitle");
}

function get_Menu($MenuName){
    return doAction("makeMenu", $MenuName);
}

function get_Link($LinkId){
    return doAction("createLink", $LinkId);
}

function get_Section($SectionName){
    return doAction("getSection", $SectionName);
}

function get_recentArticle(){
    return doAction("getRecentArticle");
}



function get_article($URI = null){
    return doAction("getArticle", $URI);
}

function get_views($URI = null){
    echo doAction("getPageViews", $URI);
}

//pages
function get_PageID($URI = null){
    return doAction("getPageID", $URI);
}

function get_HeaderTitle($URI = null){
    return doAction("getHeaderTitle", $URI);
}

function get_Owner($URI = null, $Link = false){
    return doAction("getOwner", $URI, $Link);
}

function get_PageViews($URI = null){
    return doAction("getPageViews", $URI);
}

function get_LastAccessed($URI = null){
    return doAction("getLastAccessed", $URI);
}

function get_PageData($URI = null){
    return doAction("getPageData", $URI);
}

function get_ArticleID($URI = null){
    return doAction("getArticleID", $URI);
}

//article
function get_ArticleTitle($URI = null){
    return doAction("getArticleTitle", $URI);
}
function get_ArticleCreated($URI = null){
    return doAction("getArticleCreated", $URI);
}

//categories

function get_Categories($ParentCategory = null){
    return doAction("get_Categories", $ParentCategory);
}













