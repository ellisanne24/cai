<?php

interface SectionDao {
    function getAllSections();
    function getAllSectionsInfo();
    function getSectionInfoById($sectionId);
    function addNewSection(Section  $section);//create function. Section-galing sa model. $section-var n gawa mo.
} 