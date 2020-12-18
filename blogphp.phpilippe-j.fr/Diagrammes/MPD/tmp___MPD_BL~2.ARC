<?xml version="1.0" encoding="UTF-8"?>
<architect-project version="1.0" appversion="1.0.8">
 <project-name>MPD_Blog</project-name>
 <print-settings numCopies="1" zoom="1.0" pageNumbersPrinted="true" orientation="1" paperWidth="612.0" paperHeight="792.0" leftBorder="50.0" rightBorder="50.0" topBorder="50.0" bottomBorder="50.0" />
 <project-data-sources>
  <data-source id="DS0">
   <property key="Logical" value="PlayPen Database" />
  </data-source>
 </project-data-sources>
 <source-databases>
 </source-databases>
 <target-database id="ppdb" dbcs-ref="DS0">
  <table id="TAB1" populated="true" UUID="51ae433a-2489-4158-8ffa-dffce034737c" name="Users" objectType="TABLE" physicalName="Users" >
   <remarks></remarks>
   <folder id="FOLTAB11" populated="true" name="Columns" physicalName="Columns" type="1">
    <column id="COL2" populated="true" UUID="def7ab6f-3685-4b26-865d-932964064d47" autoIncrement="false" autoIncrementSequenceName="Users_id_seq" defaultValue="" name="us_id" nullable="0" physicalName="us_id" precision="0" primaryKeySeq="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL3" populated="true" UUID="a9751e65-df51-452b-a926-1666882f0fb3" autoIncrement="false" autoIncrementSequenceName="Users_firstname_seq" defaultValue="" name="firstname" nullable="0" physicalName="firstname" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL4" populated="true" UUID="add9745f-d987-4130-b836-f9e5a40dfaf0" autoIncrement="false" autoIncrementSequenceName="Users_lastname_seq" defaultValue="" name="lastname" nullable="0" physicalName="lastname" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL5" populated="true" UUID="0233ad0a-5e3a-4e33-b5de-d6b9faa78842" autoIncrement="false" autoIncrementSequenceName="Users_pass_seq" defaultValue="" name="pass" nullable="0" physicalName="pass" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL6" populated="true" UUID="c5113e4b-eb23-4e5a-a568-71662ab2ad81" autoIncrement="false" autoIncrementSequenceName="Users_email_seq" defaultValue="" name="email" nullable="0" physicalName="email" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL7" populated="true" UUID="dc8bf243-670f-4991-88a3-025c1a7626cf" autoIncrement="false" autoIncrementSequenceName="Users_admin_seq" defaultValue="0" name="admin" nullable="0" physicalName="admin" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="16" userDefinedTypeUUID="a26374aa-3026-4bb8-b564-eb2e186dfa5d" >
     <remarks></remarks>
    </column>
    </folder>
    <folder id="FOLTAB13" populated="true" name="Exported Keys" physicalName="Exported Keys" type="3">
    </folder>
    <folder id="FOLTAB12" populated="true" name="Imported Keys" physicalName="Imported Keys" type="2">
    </folder>
    <folder id="FOLTAB14" populated="true" name="Indices" physicalName="Indices" type="4">
    <index id="IDX8" populated="true" UUID="8e820a6d-de5d-4235-9736-ecdca7e089e2" clustered="false" name="Users_pk" physicalName="users_pk" primaryKeyIndex="true" unique="false" >
     <index-column id="IDC9" populated="true" UUID="38b63726-547b-400d-aca4-94e9fd0f21db" ascendingOrDescending="UNSPECIFIED" column-ref="COL2" name="us_id" physicalName="us_id" />
    </index>
   </folder>
  </table>
  <table id="TAB10" populated="true" UUID="9e9e7d98-7fa2-4056-b6a1-b2599f9e045a" name="Blogs" objectType="TABLE" physicalName="Blogs" >
   <remarks></remarks>
   <folder id="FOLTAB101" populated="true" name="Columns" physicalName="Columns" type="1">
    <column id="COL11" populated="true" UUID="f5490d2a-ad27-405e-bd29-71adade401e3" autoIncrement="false" autoIncrementSequenceName="Blogs_id_seq" defaultValue="" name="blog_id" nullable="0" physicalName="blog_id" precision="0" primaryKeySeq="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL12" populated="true" UUID="30c3debb-0a35-40ad-8331-6ba3b1319cee" autoIncrement="false" autoIncrementSequenceName="Users_id_seq_1" defaultValue="" name="us_id" nullable="0" physicalName="us_id" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL13" populated="true" UUID="e99d42da-476c-4a55-b06d-ada876054d41" autoIncrement="false" autoIncrementSequenceName="Blogs_title_seq" defaultValue="" name="title" nullable="0" physicalName="title" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL14" populated="true" UUID="d69cdd77-a2e4-477b-948d-75f6ebbb52dd" autoIncrement="false" autoIncrementSequenceName="Blogs_content_seq" defaultValue="" name="content" nullable="0" physicalName="content" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="-1" userDefinedTypeUUID="9a814859-ab26-4acd-9415-ea82291bcac1" >
     <remarks></remarks>
    </column>
    <column id="COL15" populated="true" UUID="e27fcfb2-6af3-4fa3-8295-0acb355262ab" autoIncrement="false" autoIncrementSequenceName="Blogs_chapo_seq" defaultValue="" name="chapo" nullable="0" physicalName="chapo" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL16" populated="true" UUID="a87615e8-f062-4888-945e-4ea3a678eb2c" autoIncrement="false" autoIncrementSequenceName="Blogs_last_update_seq" defaultValue="" name="last_update" nullable="0" physicalName="last_update" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="91" userDefinedTypeUUID="ee349be3-6af2-46e1-b305-975f5354b009" >
     <remarks></remarks>
    </column>
    </folder>
    <folder id="FOLTAB103" populated="true" name="Exported Keys" physicalName="Exported Keys" type="3">
    </folder>
    <folder id="FOLTAB102" populated="true" name="Imported Keys" physicalName="Imported Keys" type="2">
    </folder>
    <folder id="FOLTAB104" populated="true" name="Indices" physicalName="Indices" type="4">
    <index id="IDX17" populated="true" UUID="c1e92cfe-d3f6-4c34-89d2-b525ea0c4799" clustered="false" name="Blogs_pk" physicalName="blogs_pk" primaryKeyIndex="true" unique="false" >
     <index-column id="IDC18" populated="true" UUID="3ec4fb8a-5ddb-4df6-9cf4-f20e44b7e6c9" ascendingOrDescending="UNSPECIFIED" column-ref="COL11" name="blog_id" physicalName="blog_id" />
    </index>
   </folder>
  </table>
  <table id="TAB19" populated="true" UUID="be3bebe4-fe0f-4d73-a6e5-4471e9f17943" name="Comments" objectType="TABLE" physicalName="Comments" >
   <remarks></remarks>
   <folder id="FOLTAB191" populated="true" name="Columns" physicalName="Columns" type="1">
    <column id="COL20" populated="true" UUID="0585c8c4-2aea-4270-a221-b6fba00a3fc9" autoIncrement="false" autoIncrementSequenceName="Comments_id_seq" defaultValue="" name="com_id" nullable="0" physicalName="com_id" precision="0" primaryKeySeq="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL21" populated="true" UUID="16792428-808d-4908-896c-4d0f858df45e" autoIncrement="false" autoIncrementSequenceName="Blogs_id_seq_1" defaultValue="" name="blog_id" nullable="0" physicalName="blog_id" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL22" populated="true" UUID="11e769b8-2780-4df9-8550-2e32e909173e" autoIncrement="false" autoIncrementSequenceName="Users_id_seq_2" defaultValue="" name="us_id" nullable="0" physicalName="us_id" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL23" populated="true" UUID="bfbc09e0-a24e-4d87-b04d-2f6344402749" autoIncrement="false" autoIncrementSequenceName="Comments_date_seq" defaultValue="" name="com_date" nullable="0" physicalName="com_date" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="91" userDefinedTypeUUID="ee349be3-6af2-46e1-b305-975f5354b009" >
     <remarks></remarks>
    </column>
    <column id="COL24" populated="true" UUID="e75f33d6-57ac-4cec-bd43-ea94d5f00278" autoIncrement="false" autoIncrementSequenceName="Comments_publish_seq" defaultValue="0" name="publish" nullable="0" physicalName="publish" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="16" userDefinedTypeUUID="a26374aa-3026-4bb8-b564-eb2e186dfa5d" >
     <remarks></remarks>
    </column>
    </folder>
    <folder id="FOLTAB193" populated="true" name="Exported Keys" physicalName="Exported Keys" type="3">
    </folder>
    <folder id="FOLTAB192" populated="true" name="Imported Keys" physicalName="Imported Keys" type="2">
    </folder>
    <folder id="FOLTAB194" populated="true" name="Indices" physicalName="Indices" type="4">
    <index id="IDX25" populated="true" UUID="d430c488-87e1-4ef9-8502-81b23bb8f326" clustered="false" name="Comments_pk" physicalName="comments_pk" primaryKeyIndex="true" unique="false" >
     <index-column id="IDC26" populated="true" UUID="8f0f6c04-f698-48ff-9f8e-8a6d9e0ba4db" ascendingOrDescending="UNSPECIFIED" column-ref="COL20" name="com_id" physicalName="com_id" />
    </index>
   </folder>
  </table>
  <table id="TAB27" populated="true" UUID="9318ff69-a731-462f-b160-38179267f112" name="Education" objectType="TABLE" physicalName="Education" >
   <remarks></remarks>
   <folder id="FOLTAB271" populated="true" name="Columns" physicalName="Columns" type="1">
    <column id="COL28" populated="true" UUID="4af6f5ce-0f9b-4908-9a5d-2a244fc7610a" autoIncrement="false" autoIncrementSequenceName="Education_id_seq" defaultValue="" name="ed_id" nullable="0" physicalName="ed_id" precision="0" primaryKeySeq="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL29" populated="true" UUID="4c7ef700-1f89-49a5-8742-fcb51cb5d0e7" autoIncrement="false" autoIncrementSequenceName="Users_id_seq_3" defaultValue="" name="us_id" nullable="0" physicalName="us_id" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL30" populated="true" UUID="e51948c8-dc42-4237-b286-ded3332d9b39" autoIncrement="false" autoIncrementSequenceName="Education_diploma_seq" defaultValue="" name="diploma" nullable="0" physicalName="diploma" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL31" populated="true" UUID="3920ac69-443a-42b7-9ebd-7c10243debfe" autoIncrement="false" autoIncrementSequenceName="Education_dip_date_seq" defaultValue="" name="dip_date" nullable="0" physicalName="dip_date" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="91" userDefinedTypeUUID="ee349be3-6af2-46e1-b305-975f5354b009" >
     <remarks></remarks>
    </column>
    </folder>
    <folder id="FOLTAB273" populated="true" name="Exported Keys" physicalName="Exported Keys" type="3">
    </folder>
    <folder id="FOLTAB272" populated="true" name="Imported Keys" physicalName="Imported Keys" type="2">
    </folder>
    <folder id="FOLTAB274" populated="true" name="Indices" physicalName="Indices" type="4">
    <index id="IDX32" populated="true" UUID="678a2b99-4d54-4008-b800-7d456c35a1bf" clustered="false" name="Education_pk" physicalName="education_pk" primaryKeyIndex="true" unique="false" >
     <index-column id="IDC33" populated="true" UUID="b2b9eb88-4abb-4a59-ac8d-8b391fbb6ec1" ascendingOrDescending="UNSPECIFIED" column-ref="COL28" name="ed_id" physicalName="ed_id" />
    </index>
   </folder>
  </table>
  <table id="TAB34" populated="true" UUID="62f8c56c-9d29-4d15-8f6a-9663ad425432" name="social" objectType="TABLE" physicalName="social" >
   <remarks></remarks>
   <folder id="FOLTAB341" populated="true" name="Columns" physicalName="Columns" type="1">
    <column id="COL35" populated="true" UUID="34a0b875-4847-4e74-b223-581182549f72" autoIncrement="false" autoIncrementSequenceName="social_soc_id_seq" defaultValue="" name="soc_id" nullable="0" physicalName="soc_id" precision="0" primaryKeySeq="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    <column id="COL36" populated="true" UUID="56362881-e3be-43fb-8cb5-f81c40e40aae" autoIncrement="false" autoIncrementSequenceName="social_twitter_seq" defaultValue="" name="twitter" nullable="0" physicalName="twitter" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL37" populated="true" UUID="190fa572-f4d9-44b4-9465-d185ec93b9f5" autoIncrement="false" autoIncrementSequenceName="social_github_seq" defaultValue="" name="github" nullable="0" physicalName="github" precision="255" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="12" userDefinedTypeUUID="831ac2d4-0e65-47ec-a0b7-62b7f6b8760a" >
     <remarks></remarks>
    </column>
    <column id="COL38" populated="true" UUID="6878020b-bc57-4080-af5d-ac070109fd68" autoIncrement="false" autoIncrementSequenceName="Users_id_seq_4" defaultValue="" name="us_id" nullable="0" physicalName="us_id" precision="0" referenceCount="1" scale="0" sourceDataTypeName="UserDefinedSQLType" type="4" userDefinedTypeUUID="63b011c7-c81f-4c75-8271-632b3c87f727" >
     <remarks></remarks>
    </column>
    </folder>
    <folder id="FOLTAB343" populated="true" name="Exported Keys" physicalName="Exported Keys" type="3">
    </folder>
    <folder id="FOLTAB342" populated="true" name="Imported Keys" physicalName="Imported Keys" type="2">
    </folder>
    <folder id="FOLTAB344" populated="true" name="Indices" physicalName="Indices" type="4">
    <index id="IDX39" populated="true" UUID="d9fa11fb-eb27-4dc1-85d4-510c599e2c7b" clustered="false" name="social_pk" physicalName="social_pk" primaryKeyIndex="true" unique="false" >
     <index-column id="IDC40" populated="true" UUID="71458a07-3c4b-4a6b-9581-38755657923c" ascendingOrDescending="UNSPECIFIED" column-ref="COL35" name="soc_id" physicalName="soc_id" />
    </index>
   </folder>
  </table>
  <relationships>
   <relationship id="REL41" populated="true" UUID="a7a0c7e7-7d8d-4ce8-b813-a1bd6cfb607d" deferrability="7" deleteRule="3" fk-table-ref="TAB19" fkCardinality="7" identifying="false" name="Users_Comments_fk" physicalName="Users_Comments_fk" pk-table-ref="TAB1" pkCardinality="2" updateRule="3" >
    <column-mapping id="CMP42" populated="true" UUID="30280e0d-dd85-4025-bbe9-4cb819d91e13" fk-column-ref="COL22" name="Column Mapping" physicalName="Column Mapping" pk-column-ref="COL2" />
   </relationship>
   <relationship id="REL43" populated="true" UUID="84a99fcc-1484-4dfb-b77b-e3282612a8a8" deferrability="7" deleteRule="3" fk-table-ref="TAB10" fkCardinality="7" identifying="false" name="Users_Blogs_fk" physicalName="Users_Blogs_fk" pk-table-ref="TAB1" pkCardinality="2" updateRule="3" >
    <column-mapping id="CMP44" populated="true" UUID="2323a272-1db6-4b82-a70c-5186ce840e00" fk-column-ref="COL12" name="Column Mapping" physicalName="Column Mapping" pk-column-ref="COL2" />
   </relationship>
   <relationship id="REL45" populated="true" UUID="bcea162d-01f4-44de-a259-244368f113a9" deferrability="7" deleteRule="3" fk-table-ref="TAB34" fkCardinality="7" identifying="false" name="Users_social_fk" physicalName="Users_social_fk" pk-table-ref="TAB1" pkCardinality="2" updateRule="3" >
    <column-mapping id="CMP46" populated="true" UUID="d33243f0-3375-42ff-93a4-c3d2adeaef2a" fk-column-ref="COL38" name="Column Mapping" physicalName="Column Mapping" pk-column-ref="COL2" />
   </relationship>
   <relationship id="REL47" populated="true" UUID="09523bba-5c03-4e00-888a-9e4ddf384a16" deferrability="7" deleteRule="3" fk-table-ref="TAB27" fkCardinality="7" identifying="false" name="Users_Education_fk" physicalName="Users_Education_fk" pk-table-ref="TAB1" pkCardinality="2" updateRule="3" >
    <column-mapping id="CMP48" populated="true" UUID="9dece546-888e-4874-bae3-b81441cec7e0" fk-column-ref="COL29" name="Column Mapping" physicalName="Column Mapping" pk-column-ref="COL2" />
   </relationship>
   <relationship id="REL49" populated="true" UUID="cb8b765c-ef3e-4183-ae0c-6556cbefe3f2" deferrability="7" deleteRule="3" fk-table-ref="TAB19" fkCardinality="7" identifying="false" name="Blogs_Comments_fk" physicalName="Blogs_Comments_fk" pk-table-ref="TAB10" pkCardinality="2" updateRule="3" >
    <column-mapping id="CMP50" populated="true" UUID="0af52d97-81ea-473b-bc6b-450c2f0452fe" fk-column-ref="COL21" name="Column Mapping" physicalName="Column Mapping" pk-column-ref="COL11" />
   </relationship>
  </relationships>
 </target-database>
 <ddl-generator type="ca.sqlpower.architect.ddl.MySqlDDLGenerator" allow-connection="true" target-catalog="blog"> </ddl-generator>
 <liquibase-settings useSeparateChangeSets="false" generateId="false" idStart="1"/>
 <create-kettle-job-settings filePath="" jobName="" schemaName="" kettleJoinType="0" savingToFile="true" />
 <play-pen zoom="1.189207115002721" viewportX="0" viewportY="0" relationship-style="rectilinear" names-displayLogicalNames="true" showPrimaryTag="true" showForeignTag="true" showAlternateTag="true" columnVisibility="ALL" relationshipLabelVisibility="true">
  <table-pane table-ref="TAB1" x="152" y="274" bgColor="0xeeeeee" fgColor="0x000000" rounded="false" dashed="false"/>
  <table-pane table-ref="TAB10" x="520" y="96" bgColor="0xeeeeee" fgColor="0x000000" rounded="false" dashed="false"/>
  <table-pane table-ref="TAB19" x="511" y="336" bgColor="0xeeeeee" fgColor="0x000000" rounded="false" dashed="false"/>
  <table-pane table-ref="TAB27" x="162" y="494" bgColor="0xeeeeee" fgColor="0x000000" rounded="false" dashed="false"/>
  <table-pane table-ref="TAB34" x="147" y="136" bgColor="0xeeeeee" fgColor="0x000000" rounded="false" dashed="false"/>
  <table-link relationship-ref="REL41" pkConnection="0.6637168141592921" fkConnection="0.31313131313131315" rLineColor="0x000000" pkLabelText="" fkLabelText="" orientation="33"/>
  <table-link relationship-ref="REL49" pkConnection="0.4666666666666667" fkConnection="0.5254237288135594" rLineColor="0x000000" pkLabelText="" fkLabelText="" orientation="132"/>
  <table-link relationship-ref="REL43" pkConnection="0.08849557522123894" fkConnection="0.8849557522123894" rLineColor="0x000000" pkLabelText="" fkLabelText="" orientation="33"/>
  <table-link relationship-ref="REL45" pkConnection="0.45454545454545453" fkConnection="0.5229885057471264" rLineColor="0x000000" pkLabelText="" fkLabelText="" orientation="72"/>
  <table-link relationship-ref="REL47" pkConnection="0.5080213903743316" fkConnection="0.4887640449438202" rLineColor="0x000000" pkLabelText="" fkLabelText="" orientation="132"/>
 </play-pen>
 <critic-manager>
  <critic-grouping platformType="Generic" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.PrimaryKeyCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.RelationshipMappingTypeCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.EmptyRelationshipCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.AlphaNumericNameCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.AlphaNumericSequenceNameCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SetDefaultOnColumnWithNoDefaultCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SetNullOnNonNullableColumnCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.DuplicateNameCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="DB2" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.DB2UnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="H2" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.H2UnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="HSQLDB" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.HSQLDBUnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="MySQL" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.MySQLCommentCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.MySQLReservedWordsCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.MySQLUnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="Oracle" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.OraclePhysicalNameCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.OracleReservedWordsCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.OracleUnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="PostgreSQL" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.PostgreSQLReservedWordsCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="SQL Server" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SQLServerUnsupportedFeaturesCritic" severity="ERROR"/>
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SQLServerReservedWordsCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="SQL Server 2000" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SQLServer2000UnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
  <critic-grouping platformType="SQL Server 2005" enabled="true">
   <critic-settings class="ca.sqlpower.architect.ddl.critic.impl.SQLServer2005UnsupportedFeaturesCritic" severity="ERROR"/>
  </critic-grouping>
 </critic-manager>
 <profiles topNCount="10">
  </profiles>
  <olap>
  </olap>
  <olap-gui>
  </olap-gui>
</architect-project>
