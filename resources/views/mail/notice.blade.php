






<div> 
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">      
	<tbody> 
		<tr>
			<td width="18" rowspan="5" bgcolor="#f7f4f9">&nbsp;</td>  
			<td bgcolor="#f7f4f9" style="background-color: #333;">
                <div width="10" alt="" class="CToWUd">
                    <center><a href="{{ env('APP_URL', '#') }}" style="text-decoration: none; color: #fff;"><h1>{{ env('APP_NAME', '')}}</h1></center>
                </div>
            </td>    
			<td width="18" rowspan="5" bgcolor="#f7f4f9">&nbsp;</td>  
		</tr>               
		<tr>
			<td bgcolor="#f7f4f9"><table width="764" border="0" cellspacing="0" cellpadding="0">    
					<tbody> 
						<tr>
							<td width="30"><div width="50" height="29" alt="" class="CToWUd" style="height: 29px; "></div></td>    
							<td style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:14px">有一位用戶透過我們的平台向你提出了諮詢，以下是他的個人資料與聯絡資訊：</td>   
						</tr>               
						<tr>
							<td colspan="2"><div width="10" height="10" alt="" class="CToWUd" style="height: 10px; "></div></td> 
						</tr>               
					</tbody>
				</table>    
				<table width="764" border="0" cellspacing="0" cellpadding="18" style="border:1px solid #dcdcdc">   
					<tbody> 
						<tr>
							<td bgcolor="#FFFFFF"><p style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;margin:0;padding:0;line-height:26px">
								<table width="726" border="0" cellspacing="0" cellpadding="0">        
									<tbody> 
										<tr>
											<td>&nbsp;</td> 
										</tr>               
										<tr>
											<td align="center"><table width="600" border="0" cellpadding="10" cellspacing="0" style="border-collapse:collapse;border:1px solid #8c8c8c">
													<tbody> 
                    <tr>
															<td width="280" align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">姓名</span></td>    
															<td align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">{{ $user->chinese_name }}</span></td>    
														</tr>
														<tr>
															<td width="280" align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">性別</span></td>               
															<td align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">{{ $user->gender == 1 ? '男': '女' }}</span></td>               
														</tr>      
														<tr>
															<td width="280" align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">生日</span></td>
															<td align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">{{ $user->birthday }}</span></td>
														</tr>        
														<tr>
															<td width="280" align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">地址</span></td>              
															<td align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">{{ $user->address }}</span></td>           
														</tr>         
														<tr>
															<td width="280" align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">信箱</span></td>
															<td align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">{{ $user->email }}</span></td>
														</tr>    
														<tr>
															<td width="280" align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">室內電話</span></td>              
															<td align="center" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px;color:#28a745">{{ $user->number_home ?? '無' }}</span></td>           
														</tr>              
														<tr>
															<td width="280" align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">行動電話</span></td>
															<td align="center" bgcolor="#efefef" style="border:1px solid #8c8c8c"><span style="font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:16px">{{ $user->number_cellphone ?? '無' }}</span></td>
														</tr> 
													</tbody>
												</table></td>               
										</tr>               
										<tr>
											<td>&nbsp;</td> 
										</tr>               
										<tr>
                                        <td align="center">
                                                <a href="{{ env('APP_URL', '#')}}" style="
                                                    text-decoration: none;
                                                    background-color: #28a745;
                                                    color: #fff;
                                                    padding: 11px 41px;
                                                    border-radius: 23px;
                                                ">前往平台</a>
                                            </td>
                                        </tr>     
										<tr>	
										<td>&nbsp;</td>	
										</tr>	                       
									</tbody>
								</table></td>               
						</tr>               
					</tbody>
				</table></td>               
		</tr>               
<tr> </tr>
<tr> </tr>
 		<tr>
			<td bgcolor="#f7f4f9"><div width="12" height="12" alt="" class="CToWUd" style="height: 12px; "></div></td>    
		</tr>               
		<tr>
			<td colspan="3" bgcolor="#ffffff"><table width="800" border="0" cellspacing="0" cellpadding="12">     
					<tbody> 
						<tr>
							<td style="text-align:center;font-family:'\005fae\008edf\006b63\009ed1\009ad4';font-size:13px;line-height:20px"><br>         
								{{ env('APP_NAME', '')}} Copyrightc 2020. All Rights Reserved.</td>        
						</tr>               
					</tbody>
				</table></td>               
		</tr>              
	</tbody>
</table><div class="yj6qo"></div><div class="adL">  
</div></div>